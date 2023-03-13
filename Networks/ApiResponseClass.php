<?php
class ApiResponse
{
    private $test;
    private $error;
    private $errorReason;
    private $ad;

    public function __construct($response, $headers = [])
    {
        // Check if response is a test ad or not
        $this->test = strpos($response, 'Tappx Test AD') !== false ? 1 : 0;

        // Convert HTTP header to associative array of keys and values
        $lines = explode("\r\n", $response);
        for ($i = 1; $i < count($lines); $i++) {
            $line = $lines[$i];
            $parts = explode(': ', $line, 2);
            if (count($parts) == 2) {
                $headers[strtolower($parts[0])] = $parts[1];
            }
        }

        // Check response status code and error reason (if any)
        if (preg_match('/HTTP\/\d\.\d\s+(\d+)\s+([^\r\n]+)/', $response, $matches)) {
            $statusCode = $matches[1];
            if ($statusCode >= 400) {
                $this->error = 1;
                $this->errorReason = 'HTTP Error ' . $statusCode;
            } else {
                $this->error = 0;
                $this->errorReason = isset($headers['x-error-reason']) ? $headers['x-error-reason'] : '';
            }
        } else {
            $this->error = 1;
            $this->errorReason = 'Invalid response format';
        }

        // Extract ad content if present in the response
        if ($this->test) {
            preg_match('/<!DOCTYPE.*<\/html>/s', $response, $matches);
            $this->ad = trim($matches[0]);
        }
    }

    public function SaveResult()
    {
        // Create array of response data
        $data = array(
            'test' => $this->test,
            'error' => $this->error,
            'error-reason' => $this->errorReason,
            'ad' => $this->ad
        );

        // Convert array to JSON and save it to a file
        $json = json_encode($data, JSON_PRETTY_PRINT);
        $filename = 'Output/' . time() . '.json';
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        fwrite($myfile, $json);
        fclose($myfile);
        return $filename;
    }
}
