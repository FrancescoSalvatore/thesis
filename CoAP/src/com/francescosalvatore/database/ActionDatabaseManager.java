package com.francescosalvatore.database;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class ActionDatabaseManager extends DatabaseManager {
	
	Connection connessione;
	
	public ActionDatabaseManager() throws SQLException
	{
		this.connessione = creaConnessione();
	}
	
	public int addAction(String actionName, int connectionId, String resourceURI) throws SQLException
	{
		PreparedStatement statement = connessione.prepareStatement("INSERT INTO action "
		+ "(ActionName, ConnectionID, ResourceURI, EventType) VALUES "
		+ "(?, ?, ?, ?)",
		new String[] {"ActionID"});
		statement.setString(1, actionName);
		statement.setInt(2, connectionId);
		statement.setString(3, resourceURI);
		//Set EventType, 0 for observe, 1 for periodic
		statement.setInt(4, 0);
		
		if(statement.executeUpdate() == 0) return 0;

		ResultSet actionId = statement.getGeneratedKeys();
		if(actionId.next()) return actionId.getInt(1);
		else				return 0;
		
	}
	
	public int addAction(int connectionId, String resourceURI, int period) throws SQLException
	{
				PreparedStatement statement = connessione.prepareStatement("INSERT INTO action "
				+ "(ConnectionID, ResourceURI, EventType, Period) VALUES "
				+ "(?, ?, ?, ?, ?)");
				statement.setInt(1, connectionId);
				statement.setString(2, resourceURI);
				//Set EventType, 0 for observe, 1 for periodic
				statement.setInt(3, 1);
				statement.setInt(4, period);
				
				if(!statement.execute()) return 0;

				ResultSet actionId = statement.getGeneratedKeys();
				if(actionId.next()) return actionId.getInt(1);
				else				return 0;
	}
	
	public boolean unregisterAction(int actionId) throws SQLException
	{
		PreparedStatement statement = connessione.prepareStatement("DELETE FROM action WHERE ActionID = ?");
		statement.setInt(1, actionId);
		if(statement.executeUpdate() == 0)
			return false;
		else
			return true;
	}
	
	public int getConnectorId(int connectionId) throws SQLException
	{
		PreparedStatement statement = connessione.prepareStatement("SELECT ConnectorID FROM user_connection WHERE ConnectionID = ?");
		statement.setInt(1, connectionId);
		ResultSet result = statement.executeQuery();
		result.next();
		return result.getInt("ConnectorID");
	}
	
	public String getConnectionInfo(int connectionId) throws SQLException
	{
		PreparedStatement statement = connessione.prepareStatement("SELECT ConnectionInfo FROM user_connection WHERE ConnectionID = ?");
		statement.setInt(1, connectionId);
		ResultSet result = statement.executeQuery();
		result.next();
		return result.getString("ConnectionInfo");
	}
	
	public String getConnectorName(int connectorId) throws SQLException
	{
		PreparedStatement statement = connessione.prepareStatement("SELECT ConnectorName FROM connector WHERE ConnectorID = ?");
		statement.setInt(1, connectorId);
		ResultSet result = statement.executeQuery();
		result.next();
		return result.getString(1);
	}

}
