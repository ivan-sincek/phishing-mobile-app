import React, {Component} from 'react';
import {StyleSheet, View, Text, BackHandler} from 'react-native';
import BaseScreen from './baseScreen';
import ActionBar from '../components/actionBar';

export default class MainScreen extends BaseScreen {
	constructor(props) {
		super(props);
		this.style = getStyleSheet();
		this.logOut = this.logOut.bind(this);
	}
	onBackPress() {
		BackHandler.exitApp();
	}
	render() {
		return (
			<View style={this.style.container}>
				<ActionBar
					background='#5B96A9'
					color='#FFFFFF'
					type='right'
					icon='sign-out'
					onPress={this.logOut}
				/>
				<View style={this.style.content}>
					<Text style={this.style.text}>Application is under construction.</Text>
				</View>
			</View>
		);
	}
}

function getStyleSheet() {
	return StyleSheet.create({
		container: {
			backgroundColor: '#FFFFFF',
			flex: 1
		},
		content: {
			alignItems: 'center',
			justifyContent: 'center',
			flex: 1,
			padding: 10
		},
		text: {
			color: '#5B96A9',
			fontSize: 20,
			textAlign: 'center'
		}
	});
}
