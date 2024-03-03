<?php
global $wpdb;
$result = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}stripe_payment" );
?>
<h2>Payments Logs</h2>
<table>
	<thead>
	<th style="border: 1px solid #000;padding: 0 10px;">№</th>
	<th style="border: 1px solid #000;padding: 0 10px;">User ID</th>
	<th style="border: 1px solid #000;padding: 0 10px;">Customer ID</th>
	<th style="border: 1px solid #000;padding: 0 10px;">Payment ID</th>
	<th style="border: 1px solid #000;padding: 0 10px;">Amount</th>
	<th style="border: 1px solid #000;padding: 0 10px;">Payment Method</th>
	<th style="border: 1px solid #000;padding: 0 10px;">Date Payment</th>
	<th style="border: 1px solid #000;padding: 0 10px;">Type</th>
	<th style="border: 1px solid #000;padding: 0 10px;">Subscription Info</th>
	</thead>
	<tbody>
	<?php foreach ( $result as $row ) : ?>
		<tr>
			<td style="border: 1px solid #000;padding: 0 10px;"><?php echo $row->id; ?></td>
			<td style="border: 1px solid #000;padding: 0 10px;"><?php echo $row->user_id; ?></td>
			<td style="border: 1px solid #000;padding: 0 10px;"><?php echo $row->customer_id; ?></td>
			<td style="border: 1px solid #000;padding: 0 10px;"><?php echo $row->payment_id; ?></td>
			<td style="border: 1px solid #000;padding: 0 10px;"><?php echo $row->amount; ?></td>
			<td style="border: 1px solid #000;padding: 0 10px;"><?php echo $row->payment_method; ?></td>
			<td style="border: 1px solid #000;padding: 0 10px;"><?php echo $row->date_payment; ?></td>
			<td style="border: 1px solid #000;padding: 0 10px;"><?php echo $row->type; ?></td>
			<td style="border: 1px solid #000;padding: 0 10px;"><?php echo $row->subscription_info; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
