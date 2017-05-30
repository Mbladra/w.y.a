package com.example.juliembp.wya;

import android.os.Bundle;
import android.content.Intent;

import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import android.support.v7.app.AppCompatActivity;
import android.view.View;

public class InitialActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_initial);

        final Button loginB = (Button) findViewById(R.id.loginButton);
        final Button registerB = (Button) findViewById(R.id.registerButton);

        //listeners for register & login buttons, sends user to respective pages on click
        registerB.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent registerIntent = new Intent(InitialActivity.this, RegisterActivity.class);
                InitialActivity.this.startActivity(registerIntent);
            }
        });
        loginB.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent loginIntent = new Intent(InitialActivity.this, LoginActivity.class);
                InitialActivity.this.startActivity(loginIntent);
            }
        });

    }
}
