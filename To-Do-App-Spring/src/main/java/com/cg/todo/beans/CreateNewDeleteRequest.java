package com.cg.todo.beans;

import lombok.Data;

@Data
public class CreateNewDeleteRequest {
	
	private Integer userId;
	private Integer taskId;
	private String view;
	
}
