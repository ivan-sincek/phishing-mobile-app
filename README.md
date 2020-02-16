# Phishing Mobile App

Phishing mobile application made in React Native v0.59.9 for both Android and iOS devices. One code for both platforms.

In addition to sending an email and password, application will send device information such as network interface MAC address and OS name and version.

You can modify and expand this application to your liking. You have everything that needs to get you started.

You can make it look like Facebook, Twitter or something else entirely.

Mobile application was tested on Samsung Galaxy J6 with Android v9.0 (Pie). Not yet tested on iOS devices.

API was tested on XAMPP for Windows v7.3.7 (64 bit).

Made for educational purposes. I hope it will help!

## How to Run

Import ['\\db\\phishing_mobile_app.sql'](https://github.com/ivan-sincek/phishing-mobile-app/blob/master/db/phishing_mobile_app.sql) to your database server.

Copy all the content from ['\\src\\api\\'](https://github.com/ivan-sincek/phishing-mobile-app/tree/master/src/api) to your server's web root directory (e.g. to '\\xampp\\htdocs\\' on XAMPP).

Change the database settings inside ['\\src\\api\\php\\config.ini'](https://github.com/ivan-sincek/phishing-app/blob/master/src/api/php/config.ini) as necessary.

Open the Command Prompt from ['\\src\\phishing-app\\'](https://github.com/ivan-sincek/phishing-mobile-app/tree/master/src/phishing-app) and run the commands shown below.

Install Node.js modules:
```fundamental
npm install
```

Clean Gradle Wrapper:
```bash
cd android && gradlew clean && cd ..
```

Launch the application on an Android device:
```fundamental
react-native run-android
```

Launch the application on an iOS device:
```fundamental
react-native run-ios
```

## Application Content

General (\\root\\):

* [constants.js](https://github.com/ivan-sincek/phishing-mobile-app/blob/master/src/phishing-app/constants.js) (Change the server IP address)
* [settings.js](https://github.com/ivan-sincek/phishing-mobile-app/blob/master/src/phishing-app/settings.js) (Async Storage)
* [App.js](https://github.com/ivan-sincek/phishing-mobile-app/blob/master/src/phishing-app/App.js) (Stack Navigator)

Network (\\root\\app\\network\\):

* [baseRequest.js](https://github.com/ivan-sincek/phishing-mobile-app/blob/master/src/phishing-app/app/network/baseRequest.js)
* [userRequest.js](https://github.com/ivan-sincek/phishing-mobile-app/blob/master/src/phishing-app/app/network/userRequest.js)

Screens (\\root\\app\\screens\\):

* [baseScreen.js](https://github.com/ivan-sincek/phishing-mobile-app/blob/master/src/phishing-app/app/screens/baseScreen.js)
* [splashScreen.js](https://github.com/ivan-sincek/phishing-mobile-app/blob/master/src/phishing-app/app/screens/splashScreen.js)
* [signInScreen.js](https://github.com/ivan-sincek/phishing-mobile-app/blob/master/src/phishing-app/app/screens/signInScreen.js)
* [mainScreen.js](https://github.com/ivan-sincek/phishing-mobile-app/blob/master/src/phishing-app/app/screens/mainScreen.js)
* [noConnectionScreen.js](https://github.com/ivan-sincek/phishing-mobile-app/blob/master/src/phishing-app/app/screens/noConnectionScreen.js)

Components (\\root\\app\\components\\):
* [actionBar.js](https://github.com/ivan-sincek/phishing-mobile-app/blob/master/src/phishing-app/app/components/actionBar.js)

## Images

![Phishing Application](https://github.com/ivan-sincek/phishing-mobile-app/blob/master/img/phishing_app.jpg)

![Database](https://github.com/ivan-sincek/phishing-mobile-app/blob/master/img/db.jpg)
