package com.cg.todo.beans;

import lombok.Data;

@Data
public class CreateNewUpdateRequest {

	private Integer userId;
	private Integer taskId;
	private String title;
	private String description;
	private String status;
	private String dueDate;
	private String view;
	
}
