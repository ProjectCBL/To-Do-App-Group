package com.cg.todo.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import com.cg.todo.beans.CreateNewDeleteRequest;
import com.cg.todo.beans.CreateNewRegistrationRequest;
import com.cg.todo.beans.CreateNewTaskRequest;
import com.cg.todo.beans.CreateNewUpdateRequest;
import com.cg.todo.beans.LoginBean;
import com.cg.todo.entities.TaskEntity;
import com.cg.todo.entities.UserEntity;
import com.cg.todo.service.ApplicationService;

@RestController
@CrossOrigin(origins = "http://localhost:4200")
public class ToDoAppController {

	@Autowired
	ApplicationService appService;
	
	@PostMapping(value="/validateLogin")
	public UserEntity validateLogin(@RequestBody LoginBean login) {
		return appService.validateLogin(login.getUsername(), login.getPassword());
	}
	
	@PostMapping(value="/registerUser")
	public Boolean registerNewUser(@RequestBody CreateNewRegistrationRequest req) {
		return appService.registerNewUser(req);
	}
	
	@PostMapping(value="/addNewTask")
	public TaskEntity addNewTask(@RequestBody CreateNewTaskRequest req) {
		return appService.addNewTask(req);
	}
	
	@PostMapping(value="/updateTask")
	public List<TaskEntity> updateTask(@RequestBody CreateNewUpdateRequest req){
		return appService.updateTask(req);
	}
	
	@PostMapping(value="/deleteTask")
	public List<TaskEntity> deleteTask(@RequestBody CreateNewDeleteRequest req){
		return appService.deleteTask(req);
	}
	
	@GetMapping(value="/getAllUserTask")
	public List<TaskEntity> getAllUserTask(@RequestParam("id") Integer userId){
		return appService.getAllUserTask(userId);
	}
	
	@GetMapping(value="/getAllCompletedUserTask")
	public List<TaskEntity> getAllCompletedUserTask(@RequestParam("id") Integer userId){
		return appService.getAllCompletedUserTask(userId);
	}
	
	@GetMapping(value="/getAllOngoingUserTask")
	public List<TaskEntity> getAllOngoingUserTask(@RequestParam("id") Integer userId){
		return appService.getAllOngoingUserTask(userId);
	}
	
}
