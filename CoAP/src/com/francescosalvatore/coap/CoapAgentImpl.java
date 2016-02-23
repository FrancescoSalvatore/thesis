package com.francescosalvatore.coap;

import java.sql.SQLException;
import java.util.ArrayList;

import com.francescosalvatore.coap.thread.CoapThread;
import com.francescosalvatore.coap.thread.ObserveThread;
import com.francescosalvatore.coap.thread.PeriodicThread;
import com.francescosalvatore.exceptions.InvalidConnectorException;

public class CoapAgentImpl implements CoapAgent {
	
	private static CoapAgent agentInstance = null;
	
	private ArrayList<CoapThread> _coapThreads;
	
	private CoapAgentImpl() 
	{
		_coapThreads = new ArrayList<CoapThread>();
	}
	
	public static synchronized CoapAgent getCoapAgent()
	{
		if(agentInstance == null)
			agentInstance = new CoapAgentImpl();
		return agentInstance;
	}

	@Override
	public boolean addAction(String actionName, int connectionId, String resourceURI) {
		System.out.println("New observable action requested, "+actionName+" ("+resourceURI+")");
		ObserveThread thread;
		try {
			thread = new ObserveThread(actionName, connectionId, resourceURI);
			thread.start();
			System.out.println("ObserveThread started for action "+actionName);
		} catch (SQLException e) {
			e.printStackTrace();
			return false;
		} catch (InvalidConnectorException e) {
			e.printStackTrace();
			return false;
		}
		_coapThreads.add(thread);
		return true;
	}

	@Override
	public boolean addAction(String actionName, int connectionId, String resourceURI, int period) {
		PeriodicThread thread;
		try
		{
			thread = new PeriodicThread(actionName, connectionId, resourceURI, period);
			thread.start();
		}
		catch(InvalidConnectorException | SQLException e) {
			e.printStackTrace();
			return false;
		}
		_coapThreads.add(thread);
		return true;
	}

	@Override
	public boolean unregisterAction(int actionId) {
		int i = 0;
		for(CoapThread thread : _coapThreads)
		{
			if(thread.getActionId() == actionId)
			{
				try 
				{
					thread.kill();
					System.out.println("Thread is alive? "+Boolean.toString(thread.isAlive()));
					break;
				} 
				catch (SQLException e) {
					e.printStackTrace();
					return false;
				}
			}
			++i;
		}
		_coapThreads.remove(i);
		return true;
	}

	@Override
	public int getLoad() {
		return _coapThreads.size();
	}

}
