package com.cg.todo.beans;

import lombok.Data;

@Data
public class CreateNewTaskRequest {

	private Integer userId;
	private String title;
	private String description;
	private String status;
	private String dueDate;
	
}
