package com.cg.todo.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

import com.cg.todo.entities.TaskEntity;

@Repository
public interface TaskRepository extends JpaRepository<TaskEntity, Integer>{
	
	@Query("SELECT t FROM TaskEntity t WHERE account_id=:userId")
	public List<TaskEntity> getAllTaskFromUser(@Param("userId") Integer userId);
	
	@Query("SELECT t FROM TaskEntity t WHERE account_id=:userId and status='Done'")
	public List<TaskEntity> getAllDoneUserTask(@Param("userId") Integer userId);
	
	@Query("SELECT t FROM TaskEntity t WHERE account_id=:userId and status!='Done'")
	public List<TaskEntity> getAllOngoingUserTask(@Param("userId") Integer userId);
	
	@Modifying
	@Query("DELETE FROM TaskEntity t WHERE taskId=:id")
	public void deleteTaskAtId(@Param("id") Integer taskId);
	
}