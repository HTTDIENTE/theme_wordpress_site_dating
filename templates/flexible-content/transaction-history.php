<div class="table-transaction-history">
	<h2>Transaction History</h2>
	<table>
		<thead>
		<tr>
			<th class="transaction-order">Order</th>
			<th class="transaction-date">Date</th>
			<th class="transaction-type">Type</th>
			<th class="transaction-total">Total</th>
			<th class="transaction-status">Status</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ( WLD_Stripe_Api::get_transactions() as $row ) : ?>
			<?php
			if ( empty( WLD_Stripe_Api::get_transactions() ) ) {
				break;
			}
			?>
			<tr>
				<td class="transaction-order" data-title="Order">#<?php echo $row['id_order'] ?? ''; ?></td>
				<td class="transaction-date" data-title="Date"><?php echo $row['date'] ?? ''; ?></td>
				<td class="transaction-type" data-title="Type"><?php echo $row['status'] ?? ''; ?></td>
				<td class="transaction-total" data-title="Total">$<?php echo $row['amount'] ?? ''; ?></td>
				<td class="transaction-status" data-title="Status">Completed</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
