package com.francescosalvatore.coap.thread;

import java.sql.SQLException;
import java.util.Timer;
import java.util.TimerTask;

import org.eclipse.californium.core.CoapClient;

import com.francescosalvatore.coap.connector.Connector;
import com.francescosalvatore.coap.connector.TwitterConnector;
import com.francescosalvatore.database.ActionDatabaseManager;
import com.francescosalvatore.exceptions.InvalidConnectorException;

public class PeriodicThread extends CoapThread {
	
	CoapClient client;
	
	Timer timer;
	
	public PeriodicThread(String actionName, int connectionId, String resourceURI, int period) throws SQLException, InvalidConnectorException
	{
		System.out.println("Adding action "+actionName+" in database and creating periodic ("+period+" minutes) relation...");
		ActionDatabaseManager dbMan = new ActionDatabaseManager();
		int actionId = dbMan.addAction(actionName, connectionId, resourceURI);
		if(actionId == 0) throw new SQLException("Error during INSERT action in database.");
		this.setActionId(actionId);
		System.out.println("Action ID: "+this.getActionId());
		
		//Build correct handler from connector
		final Connector connector;
		String connectionInfo = dbMan.getConnectionInfo(connectionId);
		switch(dbMan.getConnectorName(dbMan.getConnectorId(connectionId)))
		{
			case "Twitter":
				connector = new TwitterConnector(connectionInfo);
				break;
				
			default: 
				connector = null;
				throw new InvalidConnectorException("Connector name provided is not valid.");
		}
		
		this.client = new CoapClient(resourceURI);
		
		timer = new Timer();
		timer.schedule(new TimerTask() {
			  @Override
			  public void run() {
				  client.get(connector);
			  }
			}, period * (60*1000));
	}
	
	public void stopPeriodic()
	{
		timer.cancel();
	}
	
	public void kill() throws SQLException
	{
		this.stopPeriodic();
		super.kill();
	}

}
