package com.cg.todo.service;

import java.util.List;

import com.cg.todo.beans.CreateNewDeleteRequest;
import com.cg.todo.beans.CreateNewRegistrationRequest;
import com.cg.todo.beans.CreateNewTaskRequest;
import com.cg.todo.beans.CreateNewUpdateRequest;
import com.cg.todo.entities.TaskEntity;
import com.cg.todo.entities.UserEntity;

public interface ApplicationService {

	public abstract UserEntity validateLogin(String username, String password);
	public abstract Boolean registerNewUser(CreateNewRegistrationRequest req);
	public abstract TaskEntity addNewTask(CreateNewTaskRequest req);
	public abstract List<TaskEntity> updateTask(CreateNewUpdateRequest req);
	public abstract List<TaskEntity> deleteTask(CreateNewDeleteRequest req);
	public abstract List<TaskEntity> getAllUserTask(Integer userId);
	public abstract List<TaskEntity> getAllCompletedUserTask(Integer userId);
	public abstract List<TaskEntity> getAllOngoingUserTask(Integer userId); 
	
}
