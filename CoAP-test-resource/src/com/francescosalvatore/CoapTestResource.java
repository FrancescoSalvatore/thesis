package com.francescosalvatore;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.Random;
import java.util.Timer;
import java.util.TimerTask;

import org.eclipse.californium.core.CoapResource;
import org.eclipse.californium.core.coap.CoAP.Type;
import org.eclipse.californium.core.server.resources.CoapExchange;

public class CoapTestResource extends CoapResource {
	
	private String _data;

	public CoapTestResource(String name) {
		super(name);
		getAttributes().setTitle(name);
		//getAttributes().addResourceType("observe");
		getAttributes().setObservable();
		setObserveType(Type.CON);
		
		//Set a timer
		Timer timer = new Timer();
		timer.schedule(new TimeTask(), 0, 60*1000);
		//waitForInput();
	}
	
	private class TimeTask extends TimerTask
	{
		@Override
		public void run()
		{
			Random random = new Random();
			_data = Integer.toString(random.nextInt((30-15)+1)+15);
			changed();
		}
	}
	
	private void waitForInput()
	{
		BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
		while(true)
		{
			try 
			{
				_data = br.readLine();
			} 
			catch (IOException e) {
				e.printStackTrace();
			}
			changed();
		}
	}
	
	@Override
	public void handleGET(CoapExchange exchange)
	{
		exchange.respond("Temperature: " + _data + "°C");
	}
}
