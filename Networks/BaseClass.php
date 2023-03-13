<?php

class BaseClass
{
    // Send request function
    public function SendRequest($p_url, $p_request_content, $app_key)
    {
        // Check if URL and request content are not null
        if ($p_url === NULL || $p_request_content === NULL) {
            // Throw an error if either one is null
            throw new error('url or empty content');
        }

        // Import AdRequest class
        require_once __DIR__ . '/AdRequest.php';
        // Get contents of request file
        $request = file_get_contents('Request.txt');
        // Create new AdRequest object
        $adRequest = new AdRequest($request);

        // Set default values for appKey, ab, sz, and aid
        $appKey = "pub-1234-android-1234";
        $ab = "com.tappx.example";
        $sz = "320x480";
        $aid = "19a6c729-1e27-e936-84c1-122b2a9bbc8c";

        $url = $p_url . '?' . 'ab=' . $ab . '&os=' . $adRequest->getDeviceOs() . '&ua=' . $adRequest->urlEncode($adRequest->getDeviceUa()) . '&key=' . $app_key . '&ip=' . $adRequest->getDeviceIp() . '&sz=' . $sz . '&aid=' . $aid . '&source=app&timeout=400';
        
        // Initialize a new cURL session
        $ch = curl_init();
        // Set options for cURL session
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_URL => $url,
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                )
            )
        );
        // Set option to include response headers in the output
        curl_setopt($ch, CURLOPT_HEADER, true);
        // Execute the cURL session and get the response
        $response = curl_exec($ch);

        // Check for errors in the response
        if ($response === FALSE) {
            // Print the cURL error
            print_r('Curl error: ' . curl_error($ch));
        }

        // Close the cURL session
        curl_close($ch);

        // Return the response
        return $response;
    }
}