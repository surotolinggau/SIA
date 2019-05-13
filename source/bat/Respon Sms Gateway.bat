@echo off
title Respon SMS Gateway
:ulang
CD "C:\wamp\www\Sistem_Infrormasi_akademik_SD20LLG\source\php"
php sms_respon.php
cls
timeout 30
goto ulang
exit