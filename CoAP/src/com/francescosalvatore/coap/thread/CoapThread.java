package com.francescosalvatore.coap.thread;

import java.sql.SQLException;

import com.francescosalvatore.database.ActionDatabaseManager;

public class CoapThread extends Thread {
	
	private int actionId;
	
	public CoapThread()
	{
	}
	
	public int getActionId()
	{
		return this.actionId;
	}
	
	public void setActionId(int actionId)
	{
		this.actionId = actionId;
	}
	
	@SuppressWarnings("deprecation")
	public void kill() throws SQLException
	{
		System.out.println("Kill requested, stopping...");
		ActionDatabaseManager dbMan = new ActionDatabaseManager();
		dbMan.unregisterAction(this.getActionId()); 
		this.stop();
	}

}
