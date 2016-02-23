package com.francescosalvatore.coap;

public class CoapHandler {
	
	private CoapAgent _coapAgent;
	
	public CoapHandler()
	{
		_coapAgent = CoapAgentImpl.getCoapAgent();
	}
	
	public boolean addAction(String actionName, int connectionId, String resourceURI)
	{
		return _coapAgent.addAction(actionName, connectionId, resourceURI);
	}
	
	public boolean addAction(String actionName, int connectionId, String resourceURI, int period)
	{
		return _coapAgent.addAction(actionName, connectionId, resourceURI, period);
	}
	
	public boolean unregisterAction(int actionId)
	{
		return _coapAgent.unregisterAction(actionId);
	}

}
