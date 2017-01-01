<?php 


class event_managment{
	
	function get_featured_article(){
		$result = db_query("SELECT node.nid,node.title, file_managed.filename,file_managed.uri FROM node inner join field_data_field_featured_event on node.nid = field_data_field_featured_event.entity_id inner join field_data_field_image on node.nid = field_data_field_image.entity_id inner join file_managed on field_data_field_image.field_image_fid = file_managed.fid inner join field_data_field_event_end_date on field_data_field_event_end_date.entity_id = node.nid where field_data_field_event_end_date.field_event_end_date_value2 >= CURDATE() and field_data_field_featured_event.field_featured_event_value = 1  ");

		$data = array();
		foreach ($result as $results) {
		  $data[] = $results;
		}
		return $data;
	}
	
	function get_status_of_event($nodeid){
		$result = db_query("SELECT count(node.nid) as count FROM node 
		inner join field_data_field_event_end_date on field_data_field_event_end_date.entity_id = node.nid 
		inner join field_data_field_number_of_seats on field_data_field_number_of_seats.entity_id= node.nid 
		where field_data_field_event_end_date.field_event_end_date_value2 >= CURDATE() and field_data_field_number_of_seats.field_number_of_seats_value > 0 and node.nid = $nodeid ");

		//$data = array();
		foreach ($result as $results) {
		  $data = $results->count;
		}
		return $data;
		
	}
	
}


