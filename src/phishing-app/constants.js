global.settings = {
	// change the API address and/or port number as necessary
	// no need to put forward slash at the end
	api: 'http://192.168.8.5:80'
};

// logo
global.logo = {
	name: 'logo.png',
	path: '/img/'
};
global.logo.uri = global.settings.api + global.logo.path + global.logo.name;

// add more CSS customizations to your liking
global.css = {
	// general
	bodyBackgroundColor: '#FEFEFE',
	bodyIconColor: '#5B96A9',
	bodyTextColor: '#808080',
	// navigation bar
	navigationBackgroundColor: '#5B96A9',
	navigationIconColor: '#FEFEFE',
	// sign in page
	formLogoHeight: 160,
	formInputColor: '#808080',
	formInputIconColor: '#5B96A9',
	formInputBorderColor: '#808080',
	formErrorColor: '#5B96A9',
	formSubmitBackgroundColor: '#5B96A9',
	formSubmitIconColor: '#FEFEFE',
	// splash page
	bodyBackgroundColorInverted: '#5B96A9',
	bodyIconColorInverted: '#FEFEFE'
};

global.msg = {
	// change the welcome (sign in) message to your liking
	welcome: 'Application is under construction.',
	noConnection: 'No internet connection!'
};

global.input = {};
// input placeholders
global.input.placeholder = {
	email: 'Email',
	password: 'Password'
}
// input error messages
global.input.message = {
	email: 'Please enter email',
	password: 'Please enter password',
	global: 'Host unreachable'
}
