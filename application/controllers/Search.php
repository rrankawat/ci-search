<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function index() {
		$this->load->view('search');
	}

	public function fetch() {
		$query = $this->input->post('query');

		$response = $this->search_model->fetch($query);
		?>
		<?php if(!empty($response)): ?>
			<table class="table table-borderless">
				<thead>
					<tr>
						<th scope="col">Customer Name</th>
						<th scope="col">Address</th>
						<th scope="col">City</th>
						<th scope="col">Postal Code</th>
						<th scope="col">Country</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($response as $row): ?>
						<tr>
							<td><?php echo $row->CustomerName; ?></td>
							<td><?php echo $row->Address; ?></td>
							<td><?php echo $row->City; ?></td>
							<td><?php echo $row->PostalCode; ?></td>
							<td><?php echo $row->Country; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<p>No result found</p>
		<?php endif; ?>
		<?php
	}

	public function find() {
		$search = $this->input->post('search');
		echo $search;

		$query = explode(' ', $search);
		$response = $this->search_model->find($query);
		echo '<pre>';print_r($response);
	}

}
