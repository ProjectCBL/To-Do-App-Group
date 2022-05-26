package com.cg.todo.beans;

import lombok.Data;

@Data
public class CreateNewRegistrationRequest {

	private String firstName;
	private String lastName;
	private String email;
	private String username;
	private String password;
	
}
