<?php
/***************************************************************************
 *
 *	FolderList v3.1 (https://github.com/Kucharskov/FolderList)
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
  
/*******************************/
/* Configuration of FolderList */
/*******************************/

//Page and script language
$FL_CONFIG["lang"] = "en";

//Content of H1 at page
$FL_CONFIG["heading"] = "Page powered by FolderList";

//Content of subheading P at page (to hide leave empty)
$FL_CONFIG["subheading"] = "List any file of the folder";

//SEO: Title tag
$FL_CONFIG["sitename"] = "Page powered by FolderList";

//SEO: Meta "description" tag
$FL_CONFIG["sitedesc"] = "FolderList is a simple PHP script to interact with folder content.";

//Displaing breadcrumb with folders tree (true/false)
$FL_CONFIG["showdir"] = true;

//Displaing page load time (true/false)
$FL_CONFIG["showtime"] = false;

//Displaing "new" badge for files and dirs (amount of days, 0 to disable)
$FL_CONFIG["agebadge"] = 7;

//Hidden dirs and files
$FL_CONFIG["hiddendirs"] = [".well-known"];
$FL_CONFIG["hiddenfiles"] = [".htaccess", ".htpasswd"];

/******************************/
/* Translations of FolderList */
/******************************/

//English by Mezurashii
$FL_TRANSLATION["en"] = [
	"filename" => "Filename",
	"filesize" => "Size",
	"root" => "Home",
	"new" => "New",
	"loadtime" => "Loaded in [FL_TIME] ms",
	"nofiles" => "No files in selected folder!",
	"noaccess" => "You dont have access to selected folder!"
];

//Polish by M. Kucharskov
$FL_TRANSLATION["pl"] = [
	"filename" => "Nazwa",
	"filesize" => "Rozmiar",
	"root" => "Folder główny",
	"new" => "Nowy",
	"loadtime" => "Załadowano w [FL_TIME] ms",
	"nofiles" => "Brak plików w wybranym folderze!",
	"noaccess" => "Nie masz dostępu do wybranego folderu!"
];

//Russian by NovemberGirl
$FL_TRANSLATION["ru"] = [
	"filename" => "Название",
	"filesize" => "Размер",
	"root" => "Корневая папка",
	"new" => "Новый",
	"loadtime" => "Загружено в [FL_TIME] мс",
	"nofiles" => "Нет файлов в избранном фолдере!",
	"noaccess" => "Нет доступа к избранному фолдеру!"
];

/***************************/
/* Main code of FolderList */
/* YOU'RE EDITING THIS AT  */
/*     YOUR OWN RISK       */
/***************************/

//Turning off displaying errors
ini_set("display_errors", 0);
error_reporting(E_ALL & ~E_NOTICE);

//Icons coded in BASE64
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
$FL_IMAGES["disc"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1h
Z2VSZWFkeXHJZTwAAAIzSURBVDjLhZNbbtpQEIazgaygG4nUjXRH3QAySvvSKokEgeaBSBGFXJqAQkMxYCA03EJMzcWxCb6AAYP9
d46BhqRURfqw5Zn5z5y5bAHYWufd++hbwkdkCYUYEBXCz2yv/dcDtwmOsL/yIkotHU11irY5g9QfIp5tgdmWPtsvBJbB0YOLCuaO
C0kHjtIGvhQMfO9PMSYnh2A25sN8VyIrAY4ZNBvezyTvvUsNn66fIGgOXPpGD+jOwr4U4TwBetkhHLFvYy+loqounE74MfxnKupD
eBn06M+k55ThukzAYbHe6TG630lBx8dLBbsXCooSUOsBqapJ15mgPwFkEtAplcEcMIjYoiYcE8gLoobPyUcSkOH/JiOS1XGYqDOH
LiOcbMCkoDZlU30ChPYcgqgze54JqLfSiE6WsUvBH0jkpmEyY4d4s6RT6U0QoaKGMppHUbKYj/pHwH8ugzvtwXfaRfr+b4HiLwsh
Xsf+zYDoo7AmkM8/DMCdd73gIKlXVRcs7dUVDhMNJBssgyGOSxai5RFyzecreEW8vh9DkIGWBTQMQgMqjxOUOhOkmjOEciPs02wE
MiYSJLZeRK+NNrVGph7dDQC+C1yJQLw+x/HtFOG8hQBv4eCHiSBvkrD93Mb1QVKoXYICJCg4VnMRKc8QFsYIZhfBAd5AWrRfDtLr
UZYMFznKIF6bI1JcnH4k0C7cWfgp25tHedMyZR90lLtTrwYZKgj79s9l+s86K8t336Z1/g2YLh6PHfCmogAAAABJRU5ErkJggg";
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
$FL_IMAGES["video"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ
2VSZWFkeXHJZTwAAAIfSURBVDjLpZNPaBNBGMXfbrubzBqbg4kL0lJLgiVKE/AP6Kl6UUFQNAeDIAjVS08aELx59GQPAREV/4Bei
qcqROpRD4pUNCJSS21OgloISWMEZ/aPb6ARdNeTCz92mO+9N9/w7RphGOJ/nsH+olqtvg+CYJR8q9VquThxuVz+oJTKeZ63Uq/XC
38E0Jj3ff8+OVupVGLbolkzQw5HOqAxQU4wXWWnZrykmYD0QsgAOJe9hpEUcPr8i0GaJ8n2vs/sL2h8R66TpVfWTdETHWE6GRGKj
GiiKNLii5BSLpN7pBHpgMYhMkm8tPUWz3sL2D1wFaY/jvnWcTTaE5DyjMfTT5J0XIAiTRYn3ASwZ1MKbTmN7z+KaHUOYqmb1fcPi
Na4kQBuyvWAHYfcHGzDgYcx9NKrwJYHCAyF21JiPWBnXMAQOea6bmn+4ueYGZi8gtymNVobF7BG5prNpjd+eW6X4BSUD0gOdCpzA
8MpA/v2v15kl4+pK0emwHSbjJGBlz+vYM1fQeDrYOBTdzOGvDf6EFNr+LYjHbBgsaCLxr+moNQjU2vYhRXpgIUOmSWWnsJRfjlOZ
hrexgtYDZ/gWbetNRbNs6QT10GJglNk64HMaGgbAkoMo5fiFNy7CKDQUGqE5r38YktxAfSqW7Zt33l66WtkAkACjuNsaLVaDxlw5
HdJ/86aYrG4WCgUZD6fX+jv/U0ymfxoWVZomuZyf+8XqfGP49CCrBUAAAAASUVORK5CYII=";
$FL_IMAGES["nothing"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTU
UH3wQECCMzWjRyAgAAAxdJREFUOMt9kluIlGUYx3/vd5zZ2Tkw87nr4jh7sKVlDyYdXCLWZGnYtehkUCy4uAhR0sEULeoq7MIOok
YiQWuI0tTFXijZjXQxEmHOWCGlZuXmRjGz62azzs7Bb77vfbuICiP7XT08/P/Pc/PTuQlmr6nJO+QykphmwqzLgvzPnP7vhTahCf
Wo0tUXqpkRxomyRJ6XP4odQmIAl/7vwEsIK2MFzaLZY8fsx/y4P66VtD570Zbml2bFL/sVrU/z1WX1d0X8NYSfDIvyofISc9B8vD
HaGCNGN0EiNJB4lKzL1jl3yn2fGp8465zy/KF5BaBbz1jCH/E1d5/rsJqn5Gb5HC4r+hf6g3PzczrX0Hvd3mCxpbiMQQY4xdVqvv
oDO/EiekRAhCQOTvy2+BN8yCX2Uct8nGkopRrZM1kv923OU0o1jhw94rKfKnvJt7a2DtJBVEcPG8atxhue9H6+vvr6cpIsHc2tM8
a2jImt27cSDofJ5/KkR9Ji2/PbxMEXDhrZDdmuUEvoIZYyGjJDZcNb7t3DGCOV4xXF95inYnmYhWgwSubdDOXfy6SH0rAAZ6JfCy
7SPNM1M8FGrNr+WlETbQLuwiZEmCmEc2Gejt09WL6Fu9bF2mBSqzYY3HsnnFgQnEbz+/04t2PRjTIoc5rX6ETQwS3E4u8govc6PP
jeeqYPTLNm7RpWdPQxteplnE7UYgJFlkWucdYu2N8Z6rB6nXE2i06RUj3KzzsYj1yIM9DdQ3tLO+m707S1tHG+S+G+CATweIAKRz
lZ/7w+pTHMN+TYY5+wD5irzBk8/NBsRAEkA0kcHKiC0dQkKeHTzgzH2M1vTGpPaxf/tGgjuhExEvYH9it8SiE+Ea+nd6bd1P2pxs
r1KxtDe4ZcNlHjJHO8xS4gwQ60f1Q+izK2GK77pvuLNqw1e46XKpwr2FeSV8RsbFaVpkueP+T/KqX8iO1MsokibyNvUBlAf1bX9M
N6q3hY3KcCatgVbjs+WBHrJ6NuHK99VfuMAa6qSSW5Ka8iRJewREA4BEjRREo0iQS9mOy68SHAHzxyLm4/SSbjAAAAAElFTkSuQm
CC";

//Image return for ?image= GET call
if(isset($_GET["image"]) && !isset($_GET["dir"])) {
	header("Content-type: image/png");
	$icon = "";
	switch(strtolower($_GET["image"])) {
		default:
			$icon = $FL_IMAGES["unknown"]; break;
		case "pdf":
			$icon = $FL_IMAGES["adobe"]; break;
		case "7z": case "cab": case "gz": case "gzip": case "rar": case "tar": case "tgz": case "zip":
			$icon = $FL_IMAGES["archive"]; break;
		case "aac": case "ac3": case "m4a": case "mid": case "midi": case "mp3": case "ogg": case "wav": case "wave":
			$icon = $FL_IMAGES["audio"]; break;
		case "css": case "html": case "php": case "xhtml": case "xml":
			$icon = $FL_IMAGES["code"]; break;
		case "iso": case "img": case "ngr":
			$icon = $FL_IMAGES["disc"]; break;
		case "ods": case "xls": case "xlsx":
			$icon = $FL_IMAGES["excel"]; break;
		case "bmp": case "gif": case "jpe": case "jpg": case "jpeg": case "png": case "tga": case "tif": case "tiff":
			$icon = $FL_IMAGES["image"]; break; 
		case "odp": case "ppt": case "pptx":
			$icon = $FL_IMAGES["ppoint"]; break;
		case "cfg": case "ini": case "log": case "txt":
			$icon = $FL_IMAGES["text"]; break;
		case "doc": case "docx": case "odt":
			$icon = $FL_IMAGES["word"]; break;
		case "3gp": case "3g2": case "avi": case "m2t": case "mp4": case "mpg": case "mpeg": case "mov": case "wmv":
			$icon = $FL_IMAGES["video"]; break;
		case "warning":
			$icon = $FL_IMAGES["warning"]; break;
		case "back":
			$icon = $FL_IMAGES["back"]; break;
		case "folder":
			$icon = $FL_IMAGES["folder"]; break;
		case base64_decode("ZG9wZWZpc2g="):
			$icon = $FL_IMAGES["nothing"]; break;
	}
	echo base64_decode($icon);
	die();
}

//Start of page loading time
if($FL_CONFIG["showtime"]) $FL_TIME = microtime(true);

//Setup variables
$FL_FOLDER = dirname(__FILE__);
if($_GET["dir"]) $FL_FOLDER .= "/".$_GET["dir"];
$FL_FOLDER = rtrim($FL_FOLDER, "/");
$FL_TRACE = ltrim(str_replace(__DIR__, "", $FL_FOLDER), "/");
$FL_TRACELIST = explode("/", $FL_TRACE);
$FL_DIRS = [];
$FL_FILES = [];

//Check if user want go too far
function aboveDir($dir) {
	$dir_top = __DIR__;	
	if($dir === $dir_top) return false;
	
	$dir = realpath($dir);
	$dir_top = realpath($dir_top);	
	$dir = count(explode("/", $dir));
	$dir_top = count(explode("/", $dir_top));
	
	return $dir <= $dir_top;
}

//Return string with multilang text security
function showText($string) {
	global $FL_CONFIG;
	global $FL_TRANSLATION;

	if(!$FL_TRANSLATION[$FL_CONFIG["lang"]][$string]) {
		return $FL_TRANSLATION["en"][$string];
	} else {
		return $FL_TRANSLATION[$FL_CONFIG["lang"]][$string];
	}
}

//Return formated file size
function getFormatedSize($size) {
	if ($size > 1000000000) $size = round($size/1073741824, 0)."&nbsp;GB";
	else if ($size > 1000000) $size = round($size/1048574, 0)."&nbsp;MB";
	else if ($size > 1000) $size = round($size/1024, 0)."&nbsp;KB";
	else $size = $size."&nbsp;B";	
	
	return $size;
}

//Return function to compare objects by selected key
function buildSorterByKey($key) {
    return function ($a, $b) use ($key) {
		return strcasecmp($a[$key], $b[$key]);
	};
}

?>

<!DOCTYPE html>
<html lang="<?php echo $FL_CONFIG["lang"]; ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?php echo $FL_CONFIG["sitedesc"]; ?>">
	<meta name="generator" content="FolderList (http://folderlist.kucharskov.pl)">
	<title><?php echo $FL_CONFIG["sitename"]; ?></title>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<style type="text/css">
	<!--
	.card { overflow: hidden; }
	.card .card-header .breadcrumb { background: none; }
	.table tr td.size { text-align: right; }
	.table tr td img { text-align: center; vertical-align: baseline; }
	.table tr td a { display: block; width: auto; height: auto; }
	.table tr.table-danger td { color: #F00; }
	.badge { margin-right: 0.4em; }
	-->
	</style>
</head>
<body>

<div class="container">
<div class="row justify-content-center">
<div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 mt-3">
<div class="card">
	<div class="card-header text-center">
		<h1><?php echo $FL_CONFIG["heading"]; ?></h1>
		<?php if($FL_CONFIG["subheading"] !== "") { ?>
		<p class="h4 text-muted"><?php echo $FL_CONFIG["subheading"]; ?></p>
		<?php } ?>
		
		<?php
		if($FL_CONFIG["showdir"]) {
		?>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb p-0 m-0 mt-3">
			<?php
			if(!$_GET["dir"]) {
				echo "<li class='breadcrumb-item active'>".showText("root")."</li>";
			} else {
				//Displaying first element
				echo "<li class='breadcrumb-item'><a href='?dir='>".showText("root")."</a></li>";
				
				//Generating tracelist folders
				if(is_dir($FL_FOLDER)) {
					$count = count($FL_TRACELIST);
					for($i = 0; $i < $count-1; $i++) {
						$dir = implode("/", array_slice($FL_TRACELIST, 0, $i+1));
						echo "<li class='breadcrumb-item'><a href='?dir=".$dir."'>".$FL_TRACELIST[$i]."</a></li>";
					}
					echo "<li class='breadcrumb-item active'>".$FL_TRACELIST[$count-1]."</a></li>";
				}
			}
			?>
			</ol>
		</nav>
		<?php } ?>
	</div>
	<div class="card-body p-0">
		<table class="table table-striped table-hover table-sm table-responsive m-0">
			<thead class="text-center">
				<tr>
					<th scope="col">#</th>
					<th scope="col" class="col-12"><?php echo showText("filename"); ?></th>
					<th scope="col"><?php echo showText("filesize"); ?></th>
				</tr>
			</thead>
			<tbody>

			<?php
			//Checking folder
			if(!is_dir($FL_FOLDER) || aboveDir($FL_FOLDER)) {
				echo "<tr>";
				echo "<td><img src='?image=back'></td>";
				echo "<td colspan='2'><a href='?dir='>..</a></td>";
				echo "</tr>";
					
				echo "<tr class='table-danger'>";
				echo "<td><img src='?image=warning'></td>";
				echo "<td colspan='2'>".showText("noaccess")."</td>";
				echo "</tr>";
			} else {
				//Generating "back" row
				if($_GET["dir"]) {
					$back = substr(str_replace(end($FL_TRACELIST), "", $FL_TRACE), 0, -1);
					echo "<tr>";
					echo "<td><img src='?image=back'></td>";
					echo "<td colspan='2'><a href='?dir={$back}'>..</a></td>";
					echo "</tr>";
				}
				
				//Getting data from directory
				foreach(new DirectoryIterator($FL_FOLDER) as $element) {
					//Skip dots
					if($element->isDot()) continue;
					if($element->isFile()) {
						//Skip self file from listing
						if(!$_GET["dir"] && $element->getFilename() === pathinfo(__FILE__)["basename"]) continue;
						
						//If file is not hidden add to array
						if(!in_array($element->getFilename(), $FL_CONFIG["hiddenfiles"])) {
							$age = (int)((time() - filectime($element->getPathname())) / 86400);
							
							array_push($FL_FILES, [
								"name" => $element->getFilename(),
								"size" => $element->getSize(),
								"age" => $age,
								"ext" => $element->getExtension()
							]);
						}
					}
					if($element->isDir()) {
						//If dir is not hidden add to array
						if(!in_array($element->getFilename(), $FL_CONFIG["hiddendirs"])) {
							$age = (int)((time() - filectime($element->getPathname())) / 86400);
							
							array_push($FL_DIRS, [
								"name" => $element->getFilename(),
								"age" => $age
							]);
						}
					}
				}
				//Sorting elements
				usort($FL_DIRS, buildSorterByKey("name"));
				usort($FL_FILES, buildSorterByKey("name"));
				
				//Empty folder info
				if(count($FL_FILES) === 0 && count($FL_DIRS) === 0) {
					echo "<tr class='table-danger'>";
					echo "<td><img src='?image=warning'></td>";
					echo "<td colspan='2'>".showText("nofiles")."</td>";
					echo "</tr>";
				}
			}

			//Fix for missing last "/"
			if($_GET["dir"]) $FL_TRACE .= "/";
			
			//Displaying dirs
			foreach($FL_DIRS as $dir) {
				echo "<tr>";
				echo "<td><img src='?image=folder'></td>";
				if($FL_CONFIG["agebadge"] !== 0 && $dir["age"] < $FL_CONFIG["agebadge"]) {
					echo "<td colspan='2'><a href='?dir={$FL_TRACE}{$dir["name"]}'><span class='badge badge-danger'>".showText("new")."</span>{$dir["name"]}</a></td>";
				} else {
					echo "<td colspan='2'><a href='?dir={$FL_TRACE}{$dir["name"]}'>{$dir["name"]}</a></td>";
				}
				echo "</tr>";
			}

			//Displaying files
			foreach($FL_FILES as $file) {
				echo "<tr>";
				echo "<td><img src='?image={$file["ext"]}'></td>";
				if($FL_CONFIG["agebadge"] !== 0 && $file["age"] < $FL_CONFIG["agebadge"]) {
					echo "<td><a href='{$FL_TRACE}{$file["name"]}'><span class='badge badge-danger'>".showText("new")."</span>{$file["name"]}</a></td>";
				} else {
					echo "<td><a href='{$FL_TRACE}{$file["name"]}'>{$file["name"]}</a></td>";
				}
				echo "<td class='size'>".getFormatedSize($file["size"])."</td>";
				echo "</tr>";
			}
			?>

			</tbody>
		</table>
	</div>
</div>
</div>
</div>
<div class="row justify-content-center">
<div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12 text-center mb-3">
	<?php
	//End of page loading time measurement
	if($FL_CONFIG["showtime"]) {
		$FL_TIME = round((microtime(true) - $FL_TIME), 2);
		$FL_TIME = str_replace("[FL_TIME]", $FL_TIME, showText("loadtime"));
		echo "{$FL_TIME} |";
	}
	?>
	<a target="_blank" href="https://github.com/Kucharskov/FolderList">FolderList</a>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha384-bX7tuwViPEjy88JZEAaUe+FHOLZ9a9syCt8Z8UJ1sDbfwEIKdcFyHhW3yVPdFhd1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" integrity="sha512-6UofPqm0QupIL0kzS/UIzekR73/luZdC6i/kXDbWnLOJoqwklBK6519iUnShaYceJ0y4FaiPtX/hRnV/X/xlUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</body>
</html>