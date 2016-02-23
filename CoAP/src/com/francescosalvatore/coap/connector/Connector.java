package com.francescosalvatore.coap.connector;

import org.eclipse.californium.core.CoapHandler;
import org.eclipse.californium.core.CoapResponse;

public abstract class Connector implements CoapHandler {

	@Override
	public void onError() {
		
	}

	@Override
	public void onLoad(CoapResponse arg0) {
		
	}
	
	public abstract void parseConnectionInfo(String connectionInfo);

}
