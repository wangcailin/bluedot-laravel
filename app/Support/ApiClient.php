<?php

namespace App\Support;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Log;

class ApiClient
{
    public static function getDomain(): string
    {
        return config('composer.ai_url', 'https://flc-ai.flender.net/agent-platform/ai');
    }

    public static $header = [
        'Authorization' => 'whHMKOHrgn90cRAFC75/6AmK+r0k12Hd02q6HAJVaaQSzpzBmeK1bUzQgBLPl9Hz',
    ];

    public static $options = [
        'verify' => false,
    ];

    public static function getClient($header = []): Client
    {
        $client = new Client(self::$options);
        return $client->withHeaders(array_merge(self::$header, $header));
    }

    public static function get($path, $data = [], $header = [])
    {
        return Http::withHeaders(array_merge(self::$header, $header))
            ->withOptions(self::$options)
            ->get(self::getDomain() . $path, $data);
    }

    public static function ssePostStream($path, $data, $header = [])
    {
        try {
            $client = new Client(self::$options);
            $response = $client->post(self::getDomain() . $path, [
                'stream' => true,
                'json' => $data,
                'headers' => $header ?: self::$header,
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 300) {
                $stream = $response->getBody();
                return $stream;
            } else {
                return false;
            }
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            Log::info('WechatGPT回复报错' . $responseBodyAsString);
            return false; // 或者根据需要执行其他操作
        }
    }


    public static function post($path, $data, $header = [])
    {
        $response = Http::timeout(60)->withHeaders($header ?: self::$header)->withOptions(self::$options)->post(
            self::getDomain() . $path,
            $data
        );
        Log::info('AI保存或者更新文件，请求的数据是' . json_encode($data));
        if ($response->successful()) {
            return $response->json();
        } else {
            $statusCode = $response->status(); // 获取 HTTP 状态码
            $body = $response->body(); // 获取响应内容
            Log::info('post error body' . json_encode($body));
            Log::info('post error statusCode' . json_encode($statusCode));
            return false;
        }
    }

    public static function delete($path, $data, $header = [])
    {
        Log::info('AI删除源文件，请求的数据是' . json_encode($data));
        $response = Http::timeout(60)->withHeaders($header ?: self::$header)->withOptions(self::$options)->delete(
            self::getDomain() . $path,
            $data
        );
        return $response->json();
    }
}
