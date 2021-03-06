<?php
echo '<h1>Read several sheets</h1>';
if ( $xlsx = SimpleXLSX::parse('countries_and_population.xlsx')) {

	echo '<pre>'.print_r( $xlsx->sheetNames(), true ).'</pre>';

	echo '<table cellpadding="10">
	<tr><td valign="top">';

	// output worsheet 1

	list( $num_cols, $num_rows ) = $xlsx->dimension();

	echo '<h2>'.$xlsx->sheetName(0).'</h2>';
	echo '<table border=1>';
	foreach ( $xlsx->rows( 1 ) as $r ) {
		echo '<tr>';
		for ( $i = 0; $i < $num_cols; $i ++ ) {
			echo '<td>' . ( ! empty( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' ) . '</td>';
		}
		echo '</tr>';
	}
	echo '</table>';

	echo '</td><td valign="top">';

	// output worsheet 2

	list( $num_cols, $num_rows ) = $xlsx->dimension( 2 );

	echo '<h2>'.$xlsx->sheetName(1).'</h2>';
	echo '<table border=1>';
	foreach ( $xlsx->rows( 2 ) as $r ) {
		echo '<tr>';
		for ( $i = 0; $i < $num_cols; $i ++ ) {
			echo '<td>' . ( ! empty( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' ) . '</td>';
		}
		echo '</tr>';
	}
	echo '</table>';

	echo '</td></tr></table>';
} else {
	echo SimpleXLSX::parseError();
}