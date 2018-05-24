package portomontenegro.portomontenegro;

import android.support.design.widget.NavigationView;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentTransaction;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBar;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.ExpandableListView;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import portomontenegro.portomontenegro.Adapteri.ExpandableListAdapter;
import portomontenegro.portomontenegro.Fragmenti.HomeFragment;
import portomontenegro.portomontenegro.Fragmenti.ReqFragment;
import portomontenegro.portomontenegro.Fragmenti.RoomControlFragment;
import portomontenegro.portomontenegro.Fragmenti.TabFragment;
import portomontenegro.portomontenegro.Models.ExpandedMenuModel;

public class MainActivity extends AppCompatActivity
{
    DrawerLayout mDrawerLayout;
    NavigationView mNavigationView;
    FragmentManager mFragmentManager;
    FragmentTransaction mFragmentTransaction;

    ExpandableListAdapter mMenuAdapter;
    ExpandableListView expandableList;
    List<ExpandedMenuModel> listDataHeader;
    HashMap<ExpandedMenuModel, List<String>> listDataChild;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        expandableList = (ExpandableListView) findViewById(R.id.navigationmenu);
        mDrawerLayout = (DrawerLayout) findViewById(R.id.drawer_layout);
        mNavigationView = (NavigationView) findViewById(R.id.nav_view) ;


        prepareListData();
        mMenuAdapter = new ExpandableListAdapter(this, listDataHeader, listDataChild, expandableList);

        // setting list adapter
        expandableList.setAdapter(mMenuAdapter);

        expandableList.setOnChildClickListener(new ExpandableListView.OnChildClickListener() {
            @Override
            public boolean onChildClick(ExpandableListView expandableListView, View view, int groupPosition, int childPosition, long l) {

                if (groupPosition == 1) {
                    if(childPosition == 0)
                    {
//                        FragmentTransaction childFragmentTransaction = mFragmentManager.beginTransaction();
//                        childFragmentTransaction.replace(R.id.containerView, new HomeFragment()).commit();
//                        mDrawerLayout.closeDrawers();
//                        return true;
                    }
                    return false;
                }
                else
                    return false;
            }
        });

        expandableList.setOnGroupClickListener(new ExpandableListView.OnGroupClickListener() {
            @Override
            public boolean onGroupClick(ExpandableListView expandableListView, View view, int i, long l) {

                FragmentTransaction fragmentTransaction = mFragmentManager.beginTransaction();
                if (i == 0) {
                    fragmentTransaction.replace(R.id.containerView, new HomeFragment()).commit();
                    mDrawerLayout.closeDrawers();
                    return true;
                }
                else if(i == 1)
                {
                    fragmentTransaction.replace(R.id.containerView, new ReqFragment()).commit();
                    mDrawerLayout.closeDrawers();
                    return true;
                }
                else {
                    return false;
                }
            }
        });




        mFragmentManager = getSupportFragmentManager();
        mFragmentTransaction = mFragmentManager.beginTransaction();
        mFragmentTransaction.replace(R.id.containerView, new TabFragment()).commit();


        mNavigationView.setNavigationItemSelectedListener(new NavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(MenuItem menuItem) {
                mDrawerLayout.closeDrawers();
                return false;
            }

        });


        android.support.v7.widget.Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        ActionBar actionBar = getSupportActionBar();
        actionBar.setDisplayShowHomeEnabled(true);
        actionBar.setDisplayUseLogoEnabled(true);
        getSupportActionBar().setDisplayShowTitleEnabled(false);

        View view = toolbar.getChildAt(0);
        view.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                FragmentTransaction fragmentTransaction = mFragmentManager.beginTransaction();
                fragmentTransaction.replace(R.id.containerView,new TabFragment()).commit();
                mDrawerLayout.closeDrawers();
            }
        });

        ActionBarDrawerToggle mDrawerToggle = new ActionBarDrawerToggle(this, mDrawerLayout, toolbar,R.string.app_name,
                R.string.app_name);
        mDrawerLayout.addDrawerListener(mDrawerToggle);
        mDrawerToggle.syncState();
    }


    private void prepareListData() {
        listDataHeader = new ArrayList<>();
        listDataChild = new HashMap<>();



        ExpandedMenuModel item1 = new ExpandedMenuModel();
        item1.setIconName("Control Room");
//        item1.setIconImg(R.drawable.nekaslika);
        listDataHeader.add(item1);

        ExpandedMenuModel item2 = new ExpandedMenuModel();
        item2.setIconName("Requests");
//        item1.setIconImg(R.drawable.nekaslika);
        listDataHeader.add(item2);

        // Adding child data
//        List<String> heading1 = new ArrayList<String>();
//        heading1.add("Child1");
//
//        listDataChild.put(listDataHeader.get(1), heading1);

    }

}
