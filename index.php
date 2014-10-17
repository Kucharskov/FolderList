<?php
/***************************************************************************
 *
 *	FolderList v2.2.1 (http://folderlist.kucharskov.pl)
 *	with love by M. Kucharskov (http://kucharskov.pl)
 *	Idea: Encode Explorer (http://encode-explorer.siineiolekala.net)
 *
 *	This is free software and it's distributed under Creative Commons BY-NC-SA License.
 *
 *	FolderList is written in the hopes that it can be useful to people.
 *	It has NO WARRANTY and when you use it, the author is not responsible
 *	for how it works (or doesn't).
 *
 *	The icon images are designed by Mark James (http://www.famfamfam.com) 
 *	and distributed under the Creative Commons Attribution 3.0 License.
 *
 ***************************************************************************/

/*
 *	Configuration of FolderList
 *	Read comments and edit what you want
 */
$FL_CONFIG["SiteName"] = "Page powered by FolderList";													//Name of your site
$FL_CONFIG["ShowDir"] = 1;																				//Set to 1 to show where you are
$FL_CONFIG["ShowLoadTime"] = 0;																			//Set to 1 to show page load time
$FL_CONFIG["Hidden"] = array("index.php", ".htaccess", ".htpasswd");									//Files and folders what you won't to show
$FL_CONFIG["Language"] = "en";																			//Script Language (en, pl, ru, de)
$FL_CONFIG["Password"] = "";																			//Password to login, if you won't password leave empty

/*
 *	Translations of FolderList
 */
//English by P. Kowalczyk
$FL_TRANSLATION["en"] = array(
	"NoFiles" => "No files in selected folder!",
	"NoAccess" => "You dont have access to selected folder!",
	"FileName" => "Name",
	"FileSize" => "Size",
	"MainFolder" => "Home",
	"LoadTime" => "Loaded in [FL_TIME] ms",
	"login" => "Login",
	"logout" => "Log out",
	"LoginToSee" => "Enter password to see content",
	"BadPass" => "Incorrect password"
);
//Polish by M. Kucharskov
$FL_TRANSLATION["pl"] = array(
	"NoFiles" => "Brak plików w wybranym folderze!",
	"NoAccess" => "Nie masz dostępu do wybranego folderu!",
	"FileName" => "Nazwa",
	"FileSize" => "Rozmiar",
	"MainFolder" => "Folder główny",
	"LoadTime" => "Załadowano w [FL_TIME] ms",
	"login" => "Zaloguj",
	"logout" => "Wyloguj",
	"LoginToSee" => "Wprowadź hasło aby zobaczyć zawartość",
	"BadPass" => "Niepoprawne hasło"
);
//Russian by NovemberGirl
$FL_TRANSLATION["ru"] = array(
	"NoFiles" => "Нет файлов в избранном фолдере!",
	"NoAccess" => "Нет доступа к избранному фолдеру!",
	"FileName" => "Название",
	"FileSize" => "Размер",
	"MainFolder" => "Корневая папка",
	"LoadTime" => "Загружено в [FL_TIME] мс",
	"login" => "Войти",
	"logout" => "Выйти",
	"LoginToSee" => "Введи пароль чтобы посмотреть содержание",
	"BadPass" => "Неправильный пароль"
);
//Deutsch by M. Kucharskov
$FL_TRANSLATION["de"] = array(
	"NoFiles" => "Es Fehlen in diesen Ordner Dateien!",
	"NoAccess" => "Du hast kein Zugriff zu den ausgewählten Ordner!",
	"FileName" => "Dateiname",
	"FileSize" => "Größe",
	"MainFolder" => "Hauptordner",
	"LoadTime" => "Diese Seite wurde in [FL_TIME] ms geladen",
	"login" => "Anmelden",
	"logout" => "Ausloggen",
	"LoginToSee" => "Geben sie das Passwort ein, um den Inhalt zu zeigen",
	"BadPass" => "Falsches Passwort"
);

/*
 *	Main code of FolderList
 *	DO NOT EDIT IF YOU DO NOT KNOW WHAT YOU DO!
 */
//Turn off displaying errors
ini_set("display_errors", 0);
error_reporting(E_ALL & ~E_NOTICE);

//Icons codes in base64
$FL_IMAGES["warning"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1h
Z2VSZWFkeXHJZTwAAAJPSURBVDjLpZPLS5RhFMYfv9QJlelTQZwRb2OKlKuINuHGLlBEBEOLxAu46oL0F0QQFdWizUCrWnjBaDHg
ThCMoiKkhUONTqmjmDp2GZ0UnWbmfc/ztrC+GbM2dXbv4ZzfeQ7vefKMMfifyP89IbevNNCYdkN2kawkCZKfSPZTOGTf6Y/m1ufl
KlC3LvsNTWArr9BT2LAf+W73dn5jHclIBFZyfYWU3or7T4K7AJmbl/yG7EtX1BQXNTVCYgtgbAEAYHlqYHlrsTEVQWr63RZFuqsf
DAcdQPrGRR/JF5nKGm9xUxMyr0YBAEXXHgIANq/3ADQobD2J9fAkNiMTMSFb9z8ambMAQER3JC1XttkYGGZXoyZEGyTHRuBuPgBT
Uu7VSnUAgAUAWutOV2MjZGkehgYUA6O5A0AlkAyRnotiX3MLlFKduYCqAtuGXpyH0XQmOj+TIURt51OzURTYZdBKV2UBSsOIcRp/
TVTT4ewK6idECAihtUKOArWcjq/B8tQ6UkUR31+OYXP4sTOdisivrkMyHodWejlXwcC38Fvs8dY5xaIId89VlJy7ACpCNCFCuOp8
+BJ6A631gANQSg1mVmOxxGQYRW2nHMha4B5WA3chsv22T5/B13AIicWZmNZ6cMchTXUe81Okzz54pLi0uQWp+TmkZqMwxsBV74Or
3od4OISPr0e3SHa3PX0f3HXKofNH/UIG9pZ5PeUth+CyS2EMkEqs4fPEOBJLsyske48/+xD8oxcAYPzs4QaS7RR2kbLTTOTQiecz
fzfTv8QPldGvTGoF6/8AAAAASUVORK5CYII=";
$FL_IMAGES["back"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1h
Z2VSZWFkeXHJZTwAAAIJSURBVDjLpVM9aJNRFD35GsRSoUKKzQ/B0NJJF3EQlKrVgijSCBmC4NBFKihIcXBwEZdSHVoUwUInFUEk
Q1DQ4CKiFsQsTrb5xNpgaZHw2Uog5t5zn0NJNFaw0guX97hwzuPcc17IOYfNlIdNVrhxufR6xJkZjAbSQGXjNAorqixSWFDV3KPh
J+UGLtSQMPryrDscPwLnAHOEOQc6gkbUpIagGmApWIb/pZRX4fjj889nWiSQtgYyBZ1BTUEj6AjPa0P71nb0Jfqwa+futIheHrzR
n2yRQCUK/lOQhApBJVQJChHfnkCqOwWEQ+iORJHckUyX5ksvAEyGNuJC+s6xCRXNHNxzKMmQ4luwgjfvZp69uvr2+IZcyJ8rjIpo
rrxURggetnV0QET3rrPxzMNM2+n7p678jUTrCiWhphAjVHR9DlR0WkSzf4IHxg5MSF0zXZEuVKWKSlCBCostS8zeG7oV64wPqxIn
bw86lbVXKEQ8mkAqmUJ4SxieeVhcnANFC02C7N2h69HO2IXeWC8MDj2JnqaFNAMd8f3HKjx6+LxQRmnOz1OZaxKIaF1VISYwB9AR
ZoQaYY6o1WpYCVYxt+zDn/XzVBv/MOWXW5J44ubRyVgkelFpmF/4BJVfOVDlVyqLVBZI5manPjajDOdcswfG9k/3X9v3/vfZv7rF
BanriIo++J/f+BMT+YWS6hXl7QAAAABJRU5ErkJggg==";
$FL_IMAGES["folder"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1h
Z2VSZWFkeXHJZTwAAAGrSURBVDjLxZO7ihRBFIa/6u0ZW7GHBUV0UQQTZzd3QdhMQxOfwMRXEANBMNQX0MzAzFAwEzHwARbNFDdw
Ed31Mj3X7a6uOr9BtzNjYjKBJ6nicP7v3KqcJFaxhBVtZUAK8OHlld2st7Xl3DJPVONP+zEUV4HqL5UDYHr5xvuQAjgl/Qs7TzvO
OVAjxjlC+ePSwe6DfbVegLVuT4r14eTr6zvA8xSAoBLzx6pvj4l+DZIezuVkG9fY2H7YRQIMZIBwycmzH1/s3F8AapfIPNF3kQk7
+kw9PWBy+IZOdg5Ug3mkAATy/t0usovzGeCUWTjCz0B+Sj0ekfdvkZ3abBv+U4GaCtJ1iEm6ANQJ6fEzrG/engcKw/wXQvEKxSEK
QxRGKE7Izt+DSiwBJMUSm71rguMYhQKrBygOIRStf4TiFFRBvbRGKiQLWP29yRSHKBTtfdBmHs0BUpgvtgF4yRFR+NUKi0XZcYjC
eCG2smkzLAHkbRBmP0/Uk26O5YnUActBp1GsAI+S5nRJJJal5K1aAMrq0d6Tm9uI6zjyf75dAe6tx/SsWeD//o2/Ab6IH3/h25pO
AAAAAElFTkSuQmCC";
$FL_IMAGES["unknown"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1h
Z2VSZWFkeXHJZTwAAAC4SURBVCjPdZFbDsIgEEWnrsMm7oGGfZrohxvU+Iq1TyjU60Bf1pac4Yc5YS4ZAtGWBMk/drQBOVwJlZrW
YkLhsB8UV9K0BUrPGy9cWbng2CtEEUmLGppPjRwpbixUKHBiZRS0p+ZGhvs4irNEvWD8heHpbsyDXznPhYFOyTjJc13olIqzZCHB
ouE0FRMUjA+s1gTjaRgVFpqRwC8mfoXPPEVPS7LbRaJL2y7bOifRCTEli3U7BMWgLzKlW/CuebZPAAAAAElFTkSuQmCC";
$FL_IMAGES["adobe"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1h
Z2VSZWFkeXHJZTwAAAHhSURBVDjLjZPLSxtRFIfVZRdWi0oFBf+BrhRx5dKVYKG4tLhRqlgXPmIVJQiC60JCCZYqFHQh7rrQlUK7
aVUUfCBRG5RkJpNkkswrM5NEf73n6gxpHujAB/fOvefjnHM5VQCqCPa1MNoZnU/Qxqhx4woE7ZZlpXO53F0+n0c52Dl8Pt/nQkmh
oJOCdUWBsvQJ2u4ODMOAwvapVAqSJHGJKIrw+/2uxAmuJgFdMDUVincSxvEBTNOEpmlIp9OIxWJckMlkoOs6AoHAg6RYYNs2kp4R
qOvfuIACVFVFPB4vKYn3pFjAykDSOwVta52vqW6nlEQiwTMRBKGygIh9GEDCMwZH6EgoE+qHLMuVBdbfKwjv3yE6Ogjz/PQ/CZVD
PSFRRYE4/RHy1y8wry8RGWGSqyC/nM1meX9IQpQV2JKIUH8vrEgYmeAFwuPDCHa9QehtD26HBhCZnYC8ucGzKSsIL8wgsjiH1PYP
xL+vQvm5B/3sBMLyIm7GhhCe90BaWykV/Gp+VR9oqPVe9vfBTsruM1HtBKVPmFIUNusBrV3B4ev6bsbyXlPdkbr/u+StHUkxruBP
Y+0KY8f38oWX/byvNAdluHNLeOxDB+uyQQfPCWZ3NT69BYJWkjxjnB1o9Fv/ASQ5s+ABz8i2AAAAAElFTkSuQmCC";
$FL_IMAGES["archive"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1h
Z2VSZWFkeXHJZTwAAAEUSURBVCjPXdFNSsMAEIbh0Su4teAdIgEvJB5C14K4UexCEFQEKfivtKIIIlYQdKPiDUTRKtb0x6ZJ+vol
raEJ3+zmycwkMczGzTE3lwkbxeLE5XTqQfTIjhIm6bCy9E/icoOoyR4v7PLDN+8ibxQHxGzE3JBfHrgUalDnQ6BNk1WRFPjs66kD
NTxqg0Uh5qYg4IkrjrS9pTWfmvKaBaGaNU4EY+Lpkq88eKZKmTAhbd3i5UFZg0+TzV1d1FZy4FCpJCAQ8DUnA86ZpciiXjbQhK7a
ObDOGnNsUkra/WRAiQXdvSwWpBkGvQpnbHHMRvqRlCgBqkm/dd2745YbtofafsOcPiiMTc1fzNzHma4O/XLHCtgfTLBbxm6KrMIA
AAAASUVORK5CYII=";
$FL_IMAGES["audio"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1h
Z2VSZWFkeXHJZTwAAAETSURBVBgZfcExS0JRGIDh996OFIQEgSRhTS1Bg0trw937B9UPCAT3hnJ1kYbGhrv0BxoaXSsMhBCsyUEc
oiTKUM/3HU8Fce4Q+DyRZz5DcOkdiqIIiiAo7xiCMXs4HI4ZisPhOMcQOJQbOoxxKHm22UUxBBbHM1cRfw58GUtMIAieTIwgxAQW
RclMEZSYwCIIGYsixASCYsl4pgiGwDFF+HWUaDopbfCGHRp+nCWSTktFXvFDOKyuNNYp4LhFriPPaXW5UWAV5Y6HNH+/dbHJIjN6
NHlJzMnxWqNIDqFHh8/U7hiEJbp0+ar0m2a4MGFEjie6jCrtJs1y57FuI21R6w8g8uwnH/VJJK1ZrT3gn8gz3zcVUYEwGmDcvQAA
AABJRU5ErkJggg==";
$FL_IMAGES["code"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1h
Z2VSZWFkeXHJZTwAAAHtSURBVDjLjZM9T9tQFIYpQ5eOMBKlW6eWIQipa8RfQKQghEAKqZgKFQgmFn5AWyVDCipVQZC2EqBWlEqd
O2RCpAssQBRsx1+1ndix8wFvfW6wcUhQsfTI0j33PD7n+N4uAF2E+/S5RFwG/8Njl24/LyCIOI6j1+v1y0ajgU64cSSTybdBSVAw
SMmmacKyLB/DMKBpGkRRZBJBEJBKpXyJl/yABLTBtm1Uq1X2JsrlMnRdhyRJTFCpVEAfSafTTUlQoFs1luxBAkoolUqQZbmtJTYT
T/AoHInOfpcwtVtkwcSBgrkDGYph+60oisIq4Xm+VfB0+U/P0Lvj3NwPGfHPTcHMvoyFXwpe7UmQtAqTUCU0D1VVbwTPVk5jY19F
e3ZfQny7CE51WJDXqpjeEUHr45ki9rIqa4dmQiJfMLItGEs/FcQ2ucbRmdnSYy5vYWyLx/w3EaMfLmBaDpMQvuDJ65PY8Dpnz3wp
YmLtApzcrIAqmfrEgdZH1grY/a36w6Xz0DKD8ES25/niYS6+wWE8mWfByY8cXmYEJFYLkHUHtVqNQcltAvoLD3v7o/FUHsNvzlnw
xfsCEukC/ho3yUHaBN5Buo17Ojtyl+DqrnvQgUtfcC0ZcAdkUeA+ye7eMru9AUGIJPe4zh509UP/AAfNypi8oj/mAAAAAElFTkSu
QmCC";
$FL_IMAGES["excel"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1h
Z2VSZWFkeXHJZTwAAAIpSURBVDjLjZNPSFRRFMZ/9707o0SOOshM0x/JFtUmisKBooVEEUThsgi3KS0CN0G2lagWEYkSUdsRWgSF
G9sVFAW1EIwQqRZiiDOZY804b967954249hUpB98y/PjO5zzKREBQCm1E0gDPv9XHpgTEQeAiFCDHAmCoBhFkTXGyL8cBIGMjo7e
A3YDnog0ALJRFNlSqSTlcrnulZUVWV5elsXFRTHGyMLCgoyNjdUhanCyV9ayOSeIdTgnOCtY43DWYY3j9ulxkskkYRjinCOXy40M
DAzcZXCyVzZS38MeKRQKf60EZPXSXInL9y+wLZMkCMs0RR28mJ2grSWJEo+lH9/IpNPE43GKxSLOOYwxpFIpAPTWjiaOtZ+gLdFK
lJlD8u00xWP8lO/M5+e5efEB18b70VqjlMJai++vH8qLqoa+nn4+fJmiNNPCvMzQnIjzZuo1V88Ns3/HAcKKwfd9tNZorYnFYuuA
MLDMfJ3m+fQznr7L0Vk9zGpLmezB4zx++YggqhAFEZ7n4ft+HVQHVMoB5++cJNWaRrQwMjHM9qCLTFcnJJq59WSIMLAopQDwfR/P
8+oAbaqWK2eGSGxpxVrDnvQ+3s++4tPnj4SewYscUdUgIiilcM41/uXZG9kNz9h9aa+EYdjg+hnDwHDq+iGsaXwcZ6XhsdZW+FOq
Fk0B3caYt4Bic3Ja66NerVACOGttBXCbGbbWrgJW/VbnXbU6e5tMYIH8L54Xq0cq018+AAAAAElFTkSuQmCC";
$FL_IMAGES["image"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1h
Z2VSZWFkeXHJZTwAAAHwSURBVDjLpZM9a1RBFIafM/fevfcmC7uQjWEjUZKAYBHEVEb/gIWFjVVSWEj6gI0/wt8gprPQykIsTP5B
QLAIhBVBzRf52Gw22bk7c8YiZslugggZppuZ55z3nfdICIHrrBhg+ePaa1WZPyk0s+6KWwM1khiyhDcvns4uxQAaZOHJo4nRLMtE
JPpnxY6Cd10+fNl4DpwBTqymaZrJ8uoBHfZoyTqTYzvkSRMXlP2jnG8bFYbCXWJGePlsEq8iPQmFA2MijEBhtpis7ZCWftC0LZx3
xGnK1ESd741hqqUaqgMeAChgjGDDLqXkgMPTJtZ3KJzDhTZpmtK2OSO5IRB6xvQDRAhOsb5Lx1lOu5ZCHV4B6RLUExvh4s+ZntHh
DJAxSqs9TCDBqsc6j0iJdqtMuTROFBkIcllCCGcSytFNfm1tU8k2GRo2pOI43h9ie6tOvTJFbORyDsJFQHKD8fw+P9dWqJZ/I96T
dEa5Nb1AOavjVfti0dfB+t4iXhWvyh27y9zEbRRobG7z6fgVeqSoKvB5oIMQEODx7FLvIJo55KS9R7b5ldrDReajpC+Z5z7GAHJF
Xn1exedVbG36ijwOmJgl0kS7lXtjD0DkLyqc70uPnSuIIwk9QCmWd+9XGnOFDzP/M5xxBInhLYBcd5z/AAZv2pOvFcS/AAAAAElF
TkSuQmCC";
$FL_IMAGES["ppoint"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1h
Z2VSZWFkeXHJZTwAAAHeSURBVDjLjZO/i1NBEMc/u+/lBYxiLkgU7vRstLEUDyxtxV68ykIMWlocaGHrD1DxSAqxNf4t115jo6DY
hCRCEsk733s7u2PxkuiRoBkYdmGZz3xndsaoKgDGmC3gLBDxbxsA31U1AKCqzCBXsywbO+e8iOgqz7JM2+32W+AiYFX1GGDHOeen
06mmabrwyWSio9FI+/2+ioj2ej3tdDoLiJm+bimAhgBeUe9RmbkrT5wgT97RaDQoioIQAt1ud7/Var1h+uq+/s9+PLilw+FwqSRg
J1YpexHSKenHF4DFf/uC3b7CydsPsafraO5IkoTxeEwIARGh2WwCYNUJAOmHZ5y4eY/a7h4hPcIdHvDz/fMSnjviOCZJEiqVCtVq
dfEl8RygHkz9DLZWQzOHisd9OizfckcURRhjMMbMm14CQlEC/NfPjPd2CSJQCEEEDWYBsNZijFkaCqu5Ky+blwl5geaOUDg0c8Tn
NssSClkER1GEtXYZcOruI6ILl1AJqATirW02Hr8sFThBVZfklyXMFdQbbDzdXzm78z4Bx7KXTcwdgzs3yizuzxAhHvVh4avqBzAz
aQa4JiIHgGE9C3EcX7ezhVIgeO9/AWGdYO/9EeDNX+t8frbOdk0FHhj8BvUsfP0TH5dOAAAAAElFTkSuQmCC";
$FL_IMAGES["text"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1h
Z2VSZWFkeXHJZTwAAADoSURBVBgZBcExblNBGAbA2ceegTRBuIKOgiihSZNTcC5LUHAihNJR0kGKCDcYJY6D3/77MdOinTvzAgCw
8ysThIvn/VojIyMjIyPP+bS1sUQIV2s95pBDDvmbP/mdkft83tpYguZq5Jh/OeaYh+yzy8hTHvNlaxNNczm+la9OTlar1UdA/+C2
A4trRCnD3jS8BB1obq2Gk6GU6QbQAS4BUaYSQAf4bhhKKTFdAzrAOwAxEUAH+KEM01SY3gM6wBsEAQB0gJ+maZoC3gI6iPYaAIB
JsiRmHU0AALOeFC3aK2cWAACUXe7+AwO0lc9eTHYTAAAAAElFTkSuQmCC";
$FL_IMAGES["word"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1h
Z2VSZWFkeXHJZTwAAAIdSURBVDjLjZO7a5RREMV/9/F9yaLBzQY3CC7EpBGxU2O0EBG0sxHBUitTWYitYCsiiJL0NvlfgoWSRpGA
4IMsm43ZXchmv8e9MxZZN1GD5MCBW8yce4aZY1QVAGPMaWAacPwfm8A3VRUAVJWhyIUsy7plWcYQgh7GLMt0aWnpNTADWFX9Q2C+
LMu4s7Oj/X5/xF6vp51OR1utloYQtNls6vLy8kjE3Huz9qPIQjcUg/GZenVOokIEiSBBCKUSQ+TFwwa1Wo2iKBARVlZW3iwuLr7i
zssPnwZ50DLIoWz9zPT+s/fabrf/GQmY97GIIXGWp28/08si5+oV1jcGTCSO6nHH2pddYqmkaUq320VECCFQr9cBsBIVBbJcSdXQ
mK7Q6Qsnq54sj2gBplS896RpSpIkjI2NjVZitdh7jAOSK6trXcpC2GjlfP1esHD+GDYozjm893jvSZJkXyAWe+ssc6W5G9naLqka
w/pGxBrl1tVpJCrWWpxzI6GRgOQKCv2BYHPl5uUatROeSsVy7eIkU9UUiYoxBgDnHNbagw4U6yAWwpmphNvXT6HAhAZuLNRx1iDD
WzHG/L6ZEbyJVLa2c54/PgsKgyzw5MHcqKC9nROK/aaDvwN4KYS7j959DHk2PtuYnBUBFUEVVBQRgzX7I/wNM7RmgEshhFXAcDSI
9/6KHQZKAYkxDgA5SnOMcReI5kCcG8M42yM6iMDmL261eaOOnqrOAAAAAElFTkSuQmCC";
$_IMAGES["video"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ
2VSZWFkeXHJZTwAAAIfSURBVDjLpZNPaBNBGMXfbrubzBqbg4kL0lJLgiVKE/AP6Kl6UUFQNAeDIAjVS08aELx59GQPAREV/4Bei
qcqROpRD4pUNCJSS21OgloISWMEZ/aPb6ARdNeTCz92mO+9N9/w7RphGOJ/nsH+olqtvg+CYJR8q9VquThxuVz+oJTKeZ63Uq/XC
38E0Jj3ff8+OVupVGLbolkzQw5HOqAxQU4wXWWnZrykmYD0QsgAOJe9hpEUcPr8i0GaJ8n2vs/sL2h8R66TpVfWTdETHWE6GRGKj
GiiKNLii5BSLpN7pBHpgMYhMkm8tPUWz3sL2D1wFaY/jvnWcTTaE5DyjMfTT5J0XIAiTRYn3ASwZ1MKbTmN7z+KaHUOYqmb1fcPi
Na4kQBuyvWAHYfcHGzDgYcx9NKrwJYHCAyF21JiPWBnXMAQOea6bmn+4ueYGZi8gtymNVobF7BG5prNpjd+eW6X4BSUD0gOdCpzA
8MpA/v2v15kl4+pK0emwHSbjJGBlz+vYM1fQeDrYOBTdzOGvDf6EFNr+LYjHbBgsaCLxr+moNQjU2vYhRXpgIUOmSWWnsJRfjlOZ
hrexgtYDZ/gWbetNRbNs6QT10GJglNk64HMaGgbAkoMo5fiFNy7CKDQUGqE5r38YktxAfSqW7Zt33l66WtkAkACjuNsaLVaDxlw5
HdJ/86aYrG4WCgUZD6fX+jv/U0ymfxoWVZomuZyf+8XqfGP49CCrBUAAAAASUVORK5CYII=";

//Images return when ?img= GET call
if(isset($_GET["img"]) && !isset($_GET["dir"])) {
	header("Content-type: image/png");
	switch(strtolower($_GET["img"])) {
		default: echo base64_decode($FL_IMAGES["unknown"]); break;
		
		case "pdf": echo base64_decode($FL_IMAGES["adobe"]); break;
		
		case "7z": echo base64_decode($FL_IMAGES["archive"]); break;
		case "cab": echo base64_decode($FL_IMAGES["archive"]); break;
		case "gzip": echo base64_decode($FL_IMAGES["archive"]); break;
		case "rar": echo base64_decode($FL_IMAGES["archive"]); break;
		case "tar": echo base64_decode($FL_IMAGES["archive"]); break;
		case "tgz": echo base64_decode($FL_IMAGES["archive"]); break;
		case "zip": echo base64_decode($FL_IMAGES["archive"]); break;

		case "aac": echo base64_decode($FL_IMAGES["audio"]); break;
		case "ac3": echo base64_decode($FL_IMAGES["audio"]); break;
		case "m4a": echo base64_decode($FL_IMAGES["audio"]); break;
		case "mid": echo base64_decode($FL_IMAGES["audio"]); break;
		case "midi": echo base64_decode($FL_IMAGES["audio"]); break;
		case "mp3": echo base64_decode($FL_IMAGES["audio"]); break;
		case "ogg": echo base64_decode($FL_IMAGES["audio"]); break;
		case "wav": echo base64_decode($FL_IMAGES["audio"]); break;
		case "wave": echo base64_decode($FL_IMAGES["audio"]); break;

		case "css": echo base64_decode($FL_IMAGES["code"]); break;
		case "html": echo base64_decode($FL_IMAGES["code"]); break;
		case "php": echo base64_decode($FL_IMAGES["code"]); break;
		case "xhtml": echo base64_decode($FL_IMAGES["code"]); break;
		case "xml": echo base64_decode($FL_IMAGES["code"]); break;

		case "ods": echo base64_decode($FL_IMAGES["excel"]); break;
		case "xls": echo base64_decode($FL_IMAGES["excel"]); break;
		case "xlsx": echo base64_decode($FL_IMAGES["excel"]); break;

		case "bmp": echo base64_decode($FL_IMAGES["image"]); break;
		case "gif": echo base64_decode($FL_IMAGES["image"]); break;
		case "jpe": echo base64_decode($FL_IMAGES["image"]); break;
		case "jpg": echo base64_decode($FL_IMAGES["image"]); break;
		case "jpeg": echo base64_decode($FL_IMAGES["image"]); break;
		case "png": echo base64_decode($FL_IMAGES["image"]); break;
		case "tga": echo base64_decode($FL_IMAGES["image"]); break;
		case "tif": echo base64_decode($FL_IMAGES["image"]); break;
		case "tiff": echo base64_decode($FL_IMAGES["image"]); break;

		case "odp": echo base64_decode($FL_IMAGES["ppoint"]); break;
		case "ppt": echo base64_decode($FL_IMAGES["ppoint"]); break;
		case "pptx": echo base64_decode($FL_IMAGES["ppoint"]); break;

		case "cfg": echo base64_decode($FL_IMAGES["text"]); break;
		case "ini": echo base64_decode($FL_IMAGES["text"]); break;
		case "txt": echo base64_decode($FL_IMAGES["text"]); break;

		case "doc": echo base64_decode($FL_IMAGES["word"]); break;
		case "docx": echo base64_decode($FL_IMAGES["word"]); break;
		case "odt": echo base64_decode($FL_IMAGES["word"]); break;

		case "3gp": echo base64_decode($FL_IMAGES["video"]); break;
		case "3g2": echo base64_decode($FL_IMAGES["video"]); break;
		case "avi": echo base64_decode($FL_IMAGES["video"]); break;
		case "m2t": echo base64_decode($FL_IMAGES["video"]); break;
		case "mp4": echo base64_decode($FL_IMAGES["video"]); break;
		case "mpg": echo base64_decode($FL_IMAGES["video"]); break;
		case "mpeg": echo base64_decode($FL_IMAGES["video"]); break;
		case "mov": echo base64_decode($FL_IMAGES["video"]); break;
		case "wmv": echo base64_decode($FL_IMAGES["video"]); break;

		case "warning": echo base64_decode($FL_IMAGES["warning"]); break;
		case "back": echo base64_decode($FL_IMAGES["back"]); break;
		case "folder": echo base64_decode($FL_IMAGES["folder"]); break;
	}
	die;
}

//Start of page load time
if($FL_CONFIG["ShowLoadTime"] == 1) $FL_Time["Start"] = microtime(true);

//Getting script filename
$FL_Name = pathinfo(__FILE__);
$FL_Name = $FL_Name["basename"];

//Password protection session
if($FL_CONFIG["Password"] !== "") {
	session_name("FolderList");
	session_start();
	if(isset($_POST["password"]) && $_POST["password"] === $FL_CONFIG["Password"]) $_SESSION["FL_LOGIN"] = $FL_CONFIG["Password"];
	if($_GET["logout"]) {
		session_destroy();
		if($_GET["dir"]) header("Location: {$FL_Name}?dir={$_GET["dir"]}");
		else header("Location: {$FL_Name}");
		exit;
	}
}

//Getting dirs to usage or show
if($_GET["dir"]) {
	$FL_Folder = "{$_GET["dir"]}/*";																	//Folder to foreach items
	$FL_FolderCheck = str_replace("*", "", $FL_Folder);													//Folder to check security
	$FL_FolderLocs = explode("/", $FL_FolderCheck);														//Folder to show localization
	$FL_FolderUp = explode("/", $_GET["dir"]);
	$FL_FolderUp = substr(str_replace(end($FL_FolderUp), "", $_GET["dir"]), 0, -1);						//Folder UP
} else {
	$FL_Folder = "*";
	$FL_FolderCheck = "/";
}

//Checking files and folders
foreach(glob($FL_Folder, GLOB_BRACE) as $FL_Element) {
	if(!in_array($FL_Element, $FL_CONFIG["Hidden"])) {
		if(is_dir($FL_Element)) $FL_Folders[] .= $FL_Element;
		else $FL_Files[] .= $FL_Element;
	}
}

//Function AboveDir to check where user can go
function AboveDir($dir, $dir_top){
	if($dir === "/") $dir = __DIR__;
	
	if($dir === $dir_top) return false;
	
	$dir = realpath($dir);
	$dir_top = realpath($dir_top);
	$dir = count(explode("/", $dir));
	$dir_top = count(explode("/", $dir_top));
	
	if($dir <= $dir_top) return true;
	else return false;
}

//Function DrawTableRow to print correct row in table
function DrawTableRow($error, $icon, $text, $size) {
	if($error == 1) echo "<tr class=\"danger\">\n";
	else echo "<tr>\n";	

	if(!$icon) echo "<td></td>\n";
	else echo "<td><img src=\"?img={$icon}\"></td>\n";	
	
	echo "<td>{$text}</td>\n";	
	echo "<td>{$size}</td>\n";
	echo "</tr>\n";
}

//Function ShowText with multilang text security
function ShowText($string) {
	global $FL_CONFIG;
	global $FL_TRANSLATION;

	if(!$FL_TRANSLATION[$FL_CONFIG["Language"]][$string]) return $FL_TRANSLATION["en"][$string];
	else return $FL_TRANSLATION[$FL_CONFIG["Language"]][$string];
}

//Function Extension to return extension of file
function Extension($file) {
	$file = explode(".", strtolower($file));
	$file = end($file);
	return $file;
}

//Function GetFormatedSize to return formated file size
function GetFormatedSize($file) {
	$file = filesize($file);
	
	if ($file > 1000000000) $file = round($file/1073741824, 2)."&nbsp;GB";
	else if ($file > 1000000) $file = round($file/1048574, 2)."&nbsp;MB";
	else if ($file > 1000) $file = round($file/1024, 2)."&nbsp;KB";
	else $file = $file."&nbsp;B";	
	
	return $file;
}

?>
<!DOCTYPE html>
<html lang="<?php echo $FL_CONFIG["Language"]; ?>">
<head>
	<title><?php echo $FL_CONFIG["SiteName"]; ?></title>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="generator" content="FolderList (http://folderlist.kucharskov.pl)">

	<link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
	<!--
	.panel {
		margin: 10px 0 5px 0;
	}
	
	.panel-heading {
		padding: 5px 10px;
	}
	
	.panel-heading h1 {
		text-align: center;
		margin: 20px 0;
		word-wrap: break-word;
	}
	
	.panel-heading .breadcrumb {
		margin: 0;
		padding: 0;
	}
	
	table.table th {
		text-align: center;
	}
	
	table.table tr td:last-child {
		text-align: right;
	}
	
	table.table tr:last-child.danger td{
		color: #FF0000;
	}
	
	table.table tr td img {
		vertical-align: text-top;
	}
	
	table.table tr td a {
		width: 100%;
		height: 100%;
		margin: -5px;
		padding: 5px;
		display: block;
	}
	
	.footer {
		margin-bottom: 10px;
		text-align: center;
	}
	-->
	</style>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->	
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1><?php echo $FL_CONFIG["SiteName"]; ?></h1>
					<ol class="breadcrumb">
						<?php
						//Displaying localization of user
						if($FL_CONFIG["ShowDir"]) {
							//If user is in main folder, show only main string
							if(!$_GET["dir"]) {
								echo "<li class=\"active\">".ShowText("MainFolder")."</li>\n";
							} else {
								//Else show directores with links
								echo "<li><a href=\"?dir=\">".ShowText("MainFolder")."</a></li>\n";
								$FL_ManyFolders = count($FL_FolderLocs)-2;

								for($FL_LocNum = 0; $FL_LocNum <= $FL_ManyFolders; $FL_LocNum++) {
									if($FL_LocNum == 0) $FL_FolderBack = "{$FL_FolderLocs[$FL_LocNum]}";
									else $FL_FolderBack .= "/{$FL_FolderLocs[$FL_LocNum]}";
								
									if($FL_LocNum == $FL_ManyFolders) echo "<li class=\"active\">{$FL_FolderLocs[$FL_LocNum]}</li>\n";
									else echo "<li><a href=\"?dir={$FL_FolderBack}\">{$FL_FolderLocs[$FL_LocNum]}</a></li>\n";					
								}
							}
						}
						?>
					</ol>
				</div>
				<?php
				//If password exist and user are not logged
				if($FL_CONFIG["Password"] !== "" && $_SESSION["FL_LOGIN"] !== $FL_CONFIG["Password"]) {
					if(isset($_POST["password"]) && $_POST["password"] !== $FL_CONFIG["Password"]) $FL_LoginError = 1;
				?>
				<div class="panel-body">				
					<form action="<?php echo $FL_Name; if($_GET["dir"]) echo "?dir={$_GET["dir"]}"; ?>" method="post">
						<div class="row">
							<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
								<div class="form-group <?php if($FL_LoginError == 1) echo "has-error"; ?> ">
									<label class="control-label" for="password">
									<?php 
									if($FL_LoginError == 1) echo ShowText("BadPass");
									else echo ShowText("LoginToSee");
									?>
									</label>
									<div class="input-group">
										<input type="password" name="password" id="password" class="form-control">
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit"><?php echo ShowText("login"); ?></button>
										</span>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<?php
				}

				//If password does not exist or if usser are logged
				if($FL_CONFIG["Password"] === "" || ($FL_CONFIG["Password"] !== "" && $_SESSION["FL_LOGIN"] === $FL_CONFIG["Password"])) {
				?>
				<table class="table table-condensed table-striped table-hover">
					<thead>
						<tr>
							<th scope="col"></th>
							<th class="col-lg-10 col-md-10 col-sm-10 col-xs-10" scope="col"><?php echo ShowText("FileName"); ?></th>
							<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2" scope="col"><?php echo ShowText("FileSize"); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						//If user is in avalibe folder
						if(AboveDir($FL_FolderCheck, __DIR__)) {
							DrawTableRow(0, "back", "<a href=\"?dir=\">..</a>", "");
							DrawTableRow(1, "warning", ShowText("NoAccess"), "");
						} else {
							//If user is in folder, show back arrow
							if($_GET["dir"]) DrawTableRow(0, "back", "<a href=\"?dir={$FL_FolderUp}\">..</a>", "");
							//If folder don't contain any files, show an error
							if(count($FL_Folders) == 0 && count($FL_Files) == 0) {
								DrawTableRow(1, "warning", ShowText("NoFiles"), "");
							} else {
								//Main loops to show folders and files
								if(count($FL_Folders) != 0) {
									foreach($FL_Folders as $FL_Folder) {
										$FL_FolderName = str_replace("{$_GET["dir"]}/", "", $FL_Folder);
										DrawTableRow(0, "folder", "<a href=\"?dir={$FL_Folder}\">{$FL_FolderName}</a>", "");
									}
								}
								if(count($FL_Files) != 0) {
									foreach($FL_Files as $FL_File) {
										$FL_FileName = str_replace("{$_GET["dir"]}/", "", $FL_File);
										DrawTableRow(0, Extension($FL_FileName), "<a href=\"{$FL_File}\">{$FL_FileName}</a>", GetFormatedSize($FL_File));
									}
								}
							}
						}
						?>
					</tbody>
				</table>
				<?php
				}
				?>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
			<div class="col-lg-10 col-lg-offset-1 col-md-12 col-xm-12 col-xs-12 footer">
				<?php
				//End of page load time
				if($FL_CONFIG["ShowLoadTime"] == 1) {
					$FL_Time["End"] = microtime(true);
					$FL_Time = round(($FL_Time["End"]-$FL_Time["Start"]), 2);
					
					$FL_Time = str_replace("[FL_TIME]", $FL_Time, ShowText("LoadTime"));
					echo "{$FL_Time} | ";
				}
				?>
				<a target="_blank" href="http://folderlist.kucharskov.pl">FolderList</a>
				<?php
				//If password exist and user are logged, show "logout"
				if ($FL_CONFIG["Password"] !== "" && $_SESSION["FL_LOGIN"] === $FL_CONFIG["Password"]) {
					if($_GET["dir"]) echo " | <a href=\"?dir={$_GET["dir"]}&logout=1\">".ShowText("logout")."</a>";
					else echo " | <a href=\"?logout=1\">".ShowText("logout")."</a>";
				}
				?>
			</div>
		</div>
	</div>	
</div>

</body>
</html>
