<?php

namespace Api;

class NationalCode
{
   private static $route = 'https://s.api.ir/api/sw1/Shahkar';
   private static function apiir_request($url, array $data = [], $timeout = APIIR_TIMEOUT)
   {
      // ۱) نمونه‌ی خروجی — قبل از try ساخته می‌شود و در هر شرایطی همین برگردانده می‌شود
      $result = self::apiir_error(APIIR_DEFAULT_MESSAGE);

      try {
         // ۲) ارتباط با سرور
         // بدنه‌ی خالی باید به‌صورت {} ارسال شود نه []؛ بنابراین آرایه‌ی خالی به آبجکت تبدیل می‌شود
         $body = count($data) === 0 ? new \stdClass() : $data;

         $ch = curl_init();

         curl_setopt_array($ch, [
            CURLOPT_URL            => $url,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode($body, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR),
            CURLOPT_HTTPHEADER     => [
               'Content-Type: application/json',
               'Accept: application/json',
               'Authorization: Bearer ' . APIIR_TOKEN
            ],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => (int)$timeout,
            CURLOPT_SSL_VERIFYHOST => APIIR_SSL_VERIFY ? 2 : 0,
            CURLOPT_SSL_VERIFYPEER => APIIR_SSL_VERIFY
         ]);

         $response  = curl_exec($ch);
         $curlError = curl_error($ch);

         curl_close($ch);

         // خطای اتصال → استثنا → catch
         if ($response === false || $curlError !== '') {
            throw new \RuntimeException($curlError !== '' ? $curlError : 'ارتباط با سرور برقرار نشد.');
         }

         // پاسخ سرور، با هر کد HTTP، به قالب استاندارد تبدیل می‌شود
         // JSON نامعتبر یا خارج از قالب → استثنا → catch
         $envelope = json_decode($response, true, 512, JSON_THROW_ON_ERROR);

         if (!is_array($envelope)) {
            throw new \UnexpectedValueException('پاسخ سرور قالب استاندارد ندارد.');
         }

         $success = isset($envelope['success']) && $envelope['success'] === true;
         $code    = isset($envelope['code']) ? (int)$envelope['code'] : 0;
         $data    = isset($envelope['data']) ? $envelope['data'] : null;
         $message = isset($envelope['message']) && $envelope['message'] !== '' ? (string)$envelope['message'] : null;

         // کاربر هرگز نباید خطای بی‌پیام ببیند
         if (!$success && $message === null) {
            $message = APIIR_DEFAULT_MESSAGE;
         }

         // پر کردن result — آخرین دستور داخل try
         $result['success'] = $success;
         $result['code']    = $code;
         $result['message'] = $message;
         $result['data']    = $data;
      } catch (\Throwable $e) {
         // ۳) هر خطایی (اتصال، مهلت پاسخ، SSL، JSON نامعتبر) — فقط message پر می‌شود
         $result['message'] = $e->getMessage() !== '' ? $e->getMessage() : get_class($e);
      }

      // ۴) تنها نقطه‌ی بازگشت
      return $result;
   }
   private static function apiir_error($message, $code = 0)
   {
      return [
         'success'  => false,
         'code'     => $code,
         'message'  => $message,
         'data'     => null,
      ];
   }
   public static function check($nationalCode, $phoneNumber)
   {
      define('APIIR_TOKEN', 'Bearer +VTBV/jZ76N06n+urIedwvRy96kEFO6ZCBwoQwXof5e9wFqwwjvuuxfWlmeaFGmYLR8T8Klmm8gzPniHw5/GmUafH9pHVdhZGnmj5knHnmA=');   // کلید شما
      define('APIIR_TIMEOUT', 30);               // مهلت سراسری سرویسهای سبک (ثانیه)
      define('APIIR_SSL_VERIFY', true);          // اعتبارسنجی SSL — همیشه true بماند
      define('APIIR_DEFAULT_MESSAGE', 'درخواست ناموفق بود.');
      $result = self::apiir_request(self::$route,  [
         'nationalCode' => $nationalCode,
         'mobile'       => $phoneNumber,
         'isCompany'    => (bool)false
      ]);
      return $result;
   }
}
