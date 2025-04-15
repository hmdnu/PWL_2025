<div class="px-5 navbar bg-base-100 shadow-sm">
    <div class="flex-1">
        <a href="/" class="btn btn-ghost text-xl">RoomRent</a>
    </div>
    <div class="flex gap-5">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img
                        alt="Tailwind CSS Navbar component"
                        src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"/>
                </div>
            </div>
            <ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                <li>
                    <a href="/{{auth()->user()->id}}">Profile</a>
                </li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
