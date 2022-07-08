var events = [
  {'Date': new Date(2022, 5, 7), 'Title': 'Check in'},
  {'Date': new Date(2022, 5, 12), 'Title': 'Check out', 'Link': 'https://google.com'},
]; 
var settings = {};
var element = document.getElementById('caleandar');
caleandar(element, events, settings);
