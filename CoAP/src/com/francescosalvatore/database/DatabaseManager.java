package com.francescosalvatore.database;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class DatabaseManager {
	
	protected Connection creaConnessione() throws SQLException {
		try {
			/*ResourceBundle bundle = ResourceBundle.getBundle("configuration");

			String url = bundle.getString("database.url");*/
			String url = "jdbc:mysql://127.0.0.1:3306/coap?user=root&password=";

			return DriverManager.getConnection(url);
		} catch(SQLException e) {
			throw e;
		} catch(Throwable t) {
			throw new SQLException(t.getMessage());
		}
	}

	protected void disconnetti(Connection connection, Statement statement, ResultSet resultSet) {
		try {
			resultSet.close();
		} catch(Throwable t) {
			// Vuoto
		}

		try {
			statement.close();
		} catch(Throwable t) {
			// Vuoto
		}

		try {
			connection.close();
		} catch(Throwable t) {
			// Vuoto
		}		
	}

	protected void disconnetti(Connection connection, Statement statement) {
		disconnetti(connection, statement, null);
	}


	protected void disconnetti(Connection connection) {
		disconnetti(connection, null, null);
	}

}
