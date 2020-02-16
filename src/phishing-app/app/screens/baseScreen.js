import React, {Component} from 'react';
import {BackHandler} from 'react-native';
import NetInfo from '@react-native-community/netinfo';
import Settings from '../../settings';

export default class BaseScreen extends Component {
	constructor(props) {
		super(props);
		BackHandler.addEventListener('hardwareBackPress', this.onHardwareBackPress);
	}
	goTo(routeName, params = {}) {
		this.props.navigation.navigate(routeName, params);
	}
	onBackPress() {
		this.goTo('Main');
	}
	// this will create only one instance of given function and use that instance all the time
	onHardwareBackPress = () => {
		this.onBackPress();
		return true;
	}
	handleConnectivityChange = (isConnected) => {
		if(isConnected) {
			this.goTo('Splash');
		} else if(this.props.navigation.state.routeName != 'NoConnection') {
			this.goTo('NoConnection');
		}
	}
	componentDidMount() {
		NetInfo.isConnected.addEventListener('connectionChange', this.handleConnectivityChange);
	}
	componentWillUnmount() {
		NetInfo.isConnected.removeEventListener('connectionChange', this.handleConnectivityChange);
	}
	logOut() {
		Settings.removeSession();
		Settings.removeData();
		this.goTo('SignIn');
	}
}
