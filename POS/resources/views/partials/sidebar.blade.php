@extends('layout.app')

<div class="drawer z-10 ">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <!-- Page content here -->
        <label for="my-drawer" class="btn btn-primary drawer-button m-5">
            <span class="rotate-90">|||</span>
        </label>
    </div>
    <div class="drawer-side">
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <div class="menu bg-base-200 text-base-content min-h-full w-80 p-4 flex flex-col justify-between">
            <ul>
                <!-- Sidebar content here -->
                <li><a class="text-lg font-semibold" href="/dashboard">Dashboard</a></li>
                <li><a class="text-lg font-semibold" href="/dashboard/user">User</a></li>
                <li><a class="text-lg font-semibold" href="/dashboard/room">Room</a></li>
                <li><a class="text-lg font-semibold" href="/dashboard/rental/pending">Rental Pending</a></li>
                <li><a class="text-lg font-semibold" href="/dashboard/rental/history">Rental History</a></li>
            </ul>
            <button onclick="logout.showModal()" class="btn btn-soft btn-error">Logout</button>
        </div>
    </div>
</div>

<x-confirm-modal id="logout" title="Logout?" message="Are you sure you want to Logout?" action="/logout"
    method="GET" buttonText="Yes" />
