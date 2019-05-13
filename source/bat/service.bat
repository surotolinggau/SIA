@echo off
CD "C:\wamp\"
START wampmanager.exe

TITLE SMS Gateway SDN 20 LLG
timeout 10

CD "C:\Program Files\Sublime Text 3\"
START sublime_text.exe

CD "C:\Program Files (x86)\Google\Chrome\Application"
START chrome.exe localhost/Sistem_Infrormasi_akademik_SD20LLG/index.php


cd\
cd program files (x86)/gammu/bin
Gammu Identify
Gammu-smsd.exe -s -c smsdrc -n "GammuSMSD"
pause