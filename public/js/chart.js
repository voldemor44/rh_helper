// For Data
fetch('/table-donnees')
	.then(response => response.json())
	.then(data => {
		$(document).ready(function () {

			// Bar Chart

			Morris.Bar({
				element: 'bar-charts',
				redrawOnParentResize: true,
				data: [
					{ y: '2014', a: 50, b: 50 },
					{ y: '2015', a: 90, b: 10 },
					{ y: '2016', a: 80, b: 20 },
					{ y: '2017', a: 75, b: 25 },
					{ y: '2018', a: 50, b: 50 },
					{ y: '2019', a: 75, b: 25 },
					{ y: '2020', a: 50, b: 50 },
					{ y: '2021', a: 85, b: 15 },
					{ y: '2022', a: 60, b: 40 },
				],
				xkey: 'y',
				ykeys: ['a', 'b'],
				labels: [' Projets réalisés (%)', 'Projets en instance (%)'],
				lineColors: ['#ff9b44', '#fc6075'],
				lineWidth: '3px',
				barColors: ['#ff9b44', '#fc6075'],
				resize: true,

				redraw: true
			});

			// Line Chart

			Morris.Line({
				element: 'line-charts',
				redrawOnParentResize: true,
				data: [
					{ y: '2006', a: 50, b: 90 },
					{ y: '2007', a: 75, b: 65 },
					{ y: '2008', a: 50, b: 20 },
					{ y: '2009', a: 75, b: 65 },
					{ y: '2010', a: 50, b: 40 },
					{ y: '2011', a: 75, b: 65 },
					{ y: '2012', a: 20, b: 50 }
				],
				xkey: 'y',
				ykeys: ['a', 'b'],
				labels: ['Total Sales', 'Total Revenue'],
				lineColors: ['#ff9b44', '#fc6075'],
				lineWidth: '3px',
				resize: true,

				redraw: true
			});

		});
		// Manipulez les données dans votre fichier JavaScript

		console.log(data.employes);
	});


