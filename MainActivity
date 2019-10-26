package com.example.momo;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;

import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        //Intent intent = getIntent();
        final String userID = getIntent().getStringExtra("userID");
        final Button info_Btn = findViewById(R.id.info_Btn);
        Button manage_Btn = findViewById(R.id.manage_Btn);
        if(!userID.equals("admin"))
        {
            manage_Btn.setVisibility(View.INVISIBLE);
        }
        info_Btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(userID.equals("admin"))
                {
                    AlertDialog.Builder builder = new AlertDialog.Builder(MainActivity.this);
                    AlertDialog dialog=builder.setMessage("관리자 계정").setPositiveButton("확인",null).create();
                    dialog.show();
                }
                else {
                    String userPassword = getIntent().getStringExtra("userPassword");
                    String userEmail = getIntent().getStringExtra("userEmail");
                    String userName = getIntent().getStringExtra("userName");
                    Intent intent = new Intent(MainActivity.this, MypageActivity.class);
                    intent.putExtra("userID", userID);
                    intent.putExtra("userPassword", userPassword);
                    intent.putExtra("userName", userName);
                    intent.putExtra("userEmail", userEmail);
                    MainActivity.this.startActivity(intent);
                }
            }
        });
        //String userPassword = getIntent().getStringExtra("userPassword");

        manage_Btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick (View view){
                new BackgroundTask().execute();
            }
        });
    }

    class BackgroundTask extends AsyncTask<Void,Void,String>
    {
        String target;
        @Override
        protected String doInBackground(Void... voids) {
            try{
                URL url = new URL(target);
                HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
                InputStream inputStream = httpURLConnection.getInputStream();
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream));
                String temp;
                StringBuilder stringBuilder = new StringBuilder();
                while((temp=bufferedReader.readLine()) != null)
                {
                    stringBuilder.append(temp + "\n");
                }
                bufferedReader.close();
                inputStream.close();
                httpURLConnection.disconnect();
                return stringBuilder.toString().trim();
            } catch (Exception e){
                e.printStackTrace();
            }
            return null;
        }

        @Override
        protected void onPreExecute(){
            target = "http://khsung0.dothome.co.kr/UserList.php";
        }
        @Override
        public void onProgressUpdate(Void... values){
            super.onProgressUpdate(values);
        }


        @Override
        public void onPostExecute(String result){
            Intent intent = new Intent(MainActivity.this, ManageActivity.class);
            intent.putExtra("userList",result);
            MainActivity.this.startActivity(intent);
        }
    }
}
