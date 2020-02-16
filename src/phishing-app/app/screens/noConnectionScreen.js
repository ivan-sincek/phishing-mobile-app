import React, {Component} from 'react';
import {StyleSheet, View, Text, BackHandler} from 'react-native';
import Icon from 'react-native-vector-icons/AntDesign';
import BaseScreen from './baseScreen';

export default class NoConnectionScreen extends BaseScreen {
	constructor(props) {
		super(props);
		this.style = getStyleSheet();
	}
	onBackPress() {
		BackHandler.exitApp();
	}
	render() {
		return (
			<View style={this.style.container}>
				<Icon style={this.style.icon} name='disconnect'/>
				<Text style={this.style.text}>No internet connection!</Text>
			</View>
		);
	}
}

function getStyleSheet() {
	return StyleSheet.create({
		container: {
			backgroundColor: '#FFFFFF',
			alignItems: 'center',
			justifyContent: 'center',
			flex: 1,
			padding: 10
		},
		icon: {
			color: '#5B96A9',
			fontSize: 30
		},
		text: {
			marginTop: 20,
			color: '#5B96A9',
			fontSize: 20,
			textAlign: 'center'
		}
	});
}
