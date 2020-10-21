<?php
namespace Exinfinite;
class ServerEvent {
    protected static $_cols = [];
    static function setId($str) {
        self::$_cols['id'] = $str;
    }
    static function setEvent($str) {
        self::$_cols['event'] = $str;
    }
    static function setRetry($ms) {
        self::$_cols['retry'] = $ms;
    }
    /**
     * send stream to client
     *
     * @param [string] $data
     * @param array $opt
     * 格式參考:
     * https://developer.mozilla.org/zh-TW/docs/Web/API/Server-sent_events/Using_server-sent_events#%E4%BA%8B%E4%BB%B6%E4%B8%B2%E6%B5%81%EF%BC%88Event_Stream%EF%BC%89%E6%A0%BC%E5%BC%8F
     * @return void
     */
    static function shot($data, $opt = []) {
        header("X-Accel-Buffering: no"); //for nginx
        header("Cache-Control: no-cache");
        header("Content-Type: text/event-stream");
        self::$_cols = array_merge(self::$_cols, $opt);
        $_msg = [];
        call_user_func(function ($opt) use (&$_msg) {
            extract($opt);
            if (!is_null($id)) {
                array_push($_msg, "id: {$id}");
            }
            if (!is_null($event)) {
                array_push($_msg, "event: {$event}");
            }
            if (!is_null($retry)) {
                array_push($_msg, "retry: {$retry}");
            }
        }, self::$_cols);
        array_push($_msg, "data: {$data}");
        echo implode("\n", $_msg) . "\n\n";
        ob_flush();
        flush();
    }
}
