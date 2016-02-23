package com.francescosalvatore.coap.thread;

import java.sql.SQLException;

import org.eclipse.californium.core.CoapClient;
import org.eclipse.californium.core.CoapObserveRelation;

import com.francescosalvatore.coap.connector.Connector;
import com.francescosalvatore.coap.connector.TwitterConnector;
import com.francescosalvatore.database.ActionDatabaseManager;
import com.francescosalvatore.exceptions.InvalidConnectorException;

public class ObserveThread extends CoapThread {
	
	CoapClient client;
	CoapObserveRelation relation;
	
	public ObserveThread(String actionName, int connectionId, String resourceURI) throws SQLException, InvalidConnectorException
	{
		System.out.println("Adding action "+actionName+" in database and creating observe relation...");
		ActionDatabaseManager dbMan = new ActionDatabaseManager();
		int actionId = dbMan.addAction(actionName, connectionId, resourceURI);
		if(actionId == 0) throw new SQLException("Error during INSERT action in database.");
		this.setActionId(actionId);
		System.out.println("Action ID: "+this.getActionId());
		
		//Build correct handler from connector
		Connector connector;
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
		this.relation = client.observe(connector);
	}
	
	public void run()
	{
		try {
			for(;;) Thread.sleep(Long.MAX_VALUE);
		} catch (InterruptedException e) {
			e.printStackTrace();
		}
	}
	

}
