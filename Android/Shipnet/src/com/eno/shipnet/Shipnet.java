package com.eno.shipnet;
import android.os.Bundle;
import com.phonegap.*;
import android.view.Window;
import android.content.pm.ActivityInfo;


public class Shipnet extends DroidGap {

       
    @Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		this.requestWindowFeature(Window.FEATURE_NO_TITLE);
		this.setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_USER);
		super.loadUrl ("file:///android_asset/www/index.html");
	}
    
   
}