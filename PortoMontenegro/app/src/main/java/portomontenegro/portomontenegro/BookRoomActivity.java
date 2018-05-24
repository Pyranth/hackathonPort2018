package portomontenegro.portomontenegro;

import android.content.DialogInterface;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.ActionBar;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.ArrayAdapter;

import java.util.List;

/**
 * Created by user on 23.5.2018..
 */

public class BookRoomActivity extends AppCompatActivity
{
    String strName;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.book_room_layout);

        android.support.v7.widget.Toolbar toolbar = (android.support.v7.widget.Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        ActionBar actionBar = getSupportActionBar();

        actionBar.setDisplayUseLogoEnabled(true);
        actionBar.setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowTitleEnabled(false);

        View view = toolbar.getChildAt(0);
        view.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                onBackPressed();
            }
        });
    }

    @Override
    protected void onStart()
    {
        super.onStart();

        findViewById(R.id.residenceDropdownID).setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View view)
            {
//                ReturnLists();
            }
        });

        findViewById(R.id.roomDropdownID).setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View view)
            {
//                ReturnLists();
            }
        });


    }

    private String ReturnLists(List<String> listString)
    {

        AlertDialog.Builder builderSingle = new AlertDialog.Builder(BookRoomActivity.this);
        builderSingle.setTitle("Select One:");

        final ArrayAdapter<String> arrayAdapter = new ArrayAdapter<String>(BookRoomActivity.this, android.R.layout.select_dialog_singlechoice);
        arrayAdapter.addAll(listString);


        builderSingle.setNegativeButton("Cancel", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                dialog.dismiss();
            }
        });

        builderSingle.setAdapter(arrayAdapter, new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                strName = arrayAdapter.getItem(which);
                AlertDialog.Builder builderInner = new AlertDialog.Builder(BookRoomActivity.this);
                builderInner.setMessage(strName);
                builderInner.setTitle("You selected");
                builderInner.setPositiveButton("Ok", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog,int which) {
                        dialog.dismiss();
                    }
                });
                builderInner.show();
            }
        });
        builderSingle.show();
        return strName;

    }
}
