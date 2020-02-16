import React, {Component} from 'react';
import {createStackNavigator, createAppContainer} from 'react-navigation';
import SplashScreen from './app/screens/splashScreen';
import SignInScreen from './app/screens/signInScreen';
import MainScreen from './app/screens/mainScreen';
import NoConnectionScreen from './app/screens/noConnectionScreen';

let AppNavigator = createStackNavigator(
	{
		Splash: {screen: SplashScreen},
		SignIn: {screen: SignInScreen},
		Main: {screen: MainScreen},
		NoConnection: {screen: NoConnectionScreen}
	},
	{
		initialRouteName: 'Splash',
		headerMode: 'none'
	}
);

export default createAppContainer(AppNavigator);
