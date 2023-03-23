<?php

require_once 'vendor/autoload.php';

function generate_keywords($title, $api_key) {
    try {
        $openai = new OpenAI\OpenAI(['api_key' => $api_key]);
        $response = $openai->Completion->create([
            'engine' => 'text-davinci-002',
            'prompt' => "Generate 10 related keywords for the article titled: {$title}",
            'temperature' => 0.7,
            'max_tokens' => 100,
            'top_p' => 1,
            'frequency_penalty' => 0,
            'presence_penalty' => 0
        ]);

        $generated_text = $response['choices'][0]['text'];
        $keywords = array_map('trim', explode(',', $generated_text));

        return $keywords;
    } catch (Exception $e) {
        // Log the error message
        error_log("Error generating keywords: " . $e->getMessage());
        return [];
    }
}


function generate_article_content($title, $selected_keywords, $api_key) {
    $keywords_string = implode(', ', $selected_keywords);
    $prompt = "Write a 500-word article on the topic '{$title}' using the following keywords: {$keywords_string}";

    $openai = new OpenAI\OpenAI(['api_key' => $api_key]);
    $response = $openai->Completion->create([
        'engine' => 'text-davinci-002',
        'prompt' => $prompt,
        'temperature' => 0.7,
        'max_tokens' => 800,
        'top_p' => 1,
        'frequency_penalty' => 0,
        'presence_penalty' => 0
    ]);

    $generated_text = $response['choices'][0]['text'];

    return $generated_text;
}
