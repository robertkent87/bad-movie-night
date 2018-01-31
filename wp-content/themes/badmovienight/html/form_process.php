<?php
	// Set up points
	$pts_position = points_per_position();
	$pts_department = points_per_department();
	$each_year_worked = 20;

	// Processes the form
	if ( isset( $_POST ) && ! empty( $_POST ) ) {
		// Get input
		$name          = filter_input( INPUT_POST, 'name', FILTER_SANITIZE_STRING );
		$worked_years  = filter_input( INPUT_POST, 'worked_years', FILTER_VALIDATE_INT );
		$worked_months = filter_input( INPUT_POST, 'worked_months', FILTER_VALIDATE_INT );
		$position      = filter_input( INPUT_POST, 'position', FILTER_SANITIZE_STRING );
		$department    = filter_input( INPUT_POST, 'department', FILTER_SANITIZE_STRING );

		// Validate input
		$errors = [];

		if ( ! $name ) {
			$errors[] = 'Please enter a name!';
		}

		if ( ! $worked_years ) {
			$errors[] = 'Please select the number of years worked!';
		}

		if ( $errors ) {
			// There were errors in the form, so display errors
			$error_str = '<ul class="alert alert-warning">';
			foreach ( $errors as $error ) {
				$error_str .= '<li>' . $error . '</li>';
			}
			$error_str .= '</ul>';

			print $error_str;
		} else {
			// Process form - do something with inputs here
			$total = 0;
			$total = $pts_position[ $position ] + $pts_department[ $department ] + ( $each_year_worked * $worked_years );

			print '<div class="alert alert-success">
						<p class="h1">' . $total . ' points</p>
						<p>' . $pts_position[ $position ] . ' + ' . $pts_department[ $department ] . ' + (' . $each_year_worked . ' x ' . $worked_years . ')</p>
					</div>';
		}
	} else {
		// Nothing submitted
		print '<p>Form not submitted!</p>';
	}

	/**
	 * @return array
	 */
	function points_per_position() {
		return [
			'assistant'  => 10,
			'manager'    => 20,
			'supervisor' => 50,
			'clevel'     => 100,
		];
	}

	/**
	 * @return array
	 */
	function points_per_department() {
		return [
			'sales'     => 10,
			'marketing' => 20,
			'devops'    => 50,
			'technical' => 100,
		];
	}