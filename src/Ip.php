<?php
/**
 * by tim168 <784699571@qq.com>
 * github https://github.com/TIM168
 */
namespace Tim168\Ip;

use GuzzleHttp\Client;
use Tim168\Ip\Exceptions\HttpException;
use Tim168\Ip\Exceptions\InvalidArgumentException;

/**
 * Class Ip
 * @package Tim168\Ip
 */
class Ip
{
    /**
     * @return Client
     */
    public static function getHttpClient()
    {
        return new Client();
    }

    /**
     * @param string $type
     * @param string $ip
     * @param int $timeout
     * @param string $lang
     * @return string
     * @throws HttpException
     * @throws InvalidArgumentException
     */
    public static function getIp($type = 'json', $ip = '', $timeout = 10,$lang = '')
    {
        $url = 'http://ip-api.com/' . $type . '/' . $ip;

        if (!in_array(strtolower($type), ['xml', 'json', 'php', 'csv'])) {
            throw new InvalidArgumentException('Invalid response type:' . $type);
        }

        self::checkIp($ip);

        $query = array_filter([
            'lang' => $lang ? $lang : 'zh-CN'
        ]);

        try {
            $response = self::getHttpClient()->get($url, [
                'query' => $query, 'timeout' => $timeout,
            ])->getBody()->getContents();

            return $response;
        } catch (\Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }

    }

    /**
     * @param $ip
     * @throws InvalidArgumentException
     */
    public static function checkIp($ip)
    {
        if (!empty($ip)) {
            if (!filter_var($ip, \FILTER_VALIDATE_IP)) {
                throw new InvalidArgumentException('Invalid Ip:' . $ip);
            }
        }
    }

    /**
     * @param $ip
     * @throws InvalidArgumentException
     */
    public function checkIpV4($ip)
    {
        if (!empty($ip)) {
            if (!filter_var($ip, \FILTER_VALIDATE_IP, \FILTER_FLAG_IPV4)) {
                throw new InvalidArgumentException('Invalid IpV4:' . $ip);
            }
        }
    }

    /**
     * @param $ip
     * @throws InvalidArgumentException
     */
    public function checkIpV6($ip)
    {
        if (!empty($ip)) {
            if (!filter_var($ip, \FILTER_VALIDATE_IP, \FILTER_FLAG_IPV6)) {
                throw new InvalidArgumentException('Invalid IpV6:' . $ip);
            }
        }
    }

    /**
     * @param $ip
     * @return string
     * @throws InvalidArgumentException
     */
    public function IpV4toV6($ip)
    {
        $this->checkIpV4($ip);
        $set = '0000:0000:0000:0000:0000:ffff:';
        $arr = explode('.', $ip);
        $new = [];
        foreach ($arr as $k => $value) {
            $tran = base_convert($value, 10, 16);
            if (strlen($tran) == 1) {
                $tran = '0' . $tran;
            }
            $new[$k] = $tran;
        }
        $IpV6 = $set . $new[0] . $new[1] . ':' . $new[2] . $new[3];
        return $IpV6;
    }

    /**
     * @param $ip
     * @return string
     * @throws InvalidArgumentException
     */
    public function IpV6toV4($ip)
    {
        $this->checkIpV6($ip);
        $str = mb_substr($ip, 30, 38);
        $arr = explode(':', $str);
        $Ip1 = base_convert(mb_substr($arr[0], 0, 2), 16, 10);
        $Ip2 = base_convert(mb_substr($arr[0], 2, 4), 16, 10);
        $Ip3 = base_convert(mb_substr($arr[1], 0, 2), 16, 10);
        $Ip4 = base_convert(mb_substr($arr[1], 2, 4), 16, 10);
        $IpV4 = $Ip1 . '.' . $Ip2 . '.' . $Ip3 . '.' . $Ip4;
        return $IpV4;
    }
}