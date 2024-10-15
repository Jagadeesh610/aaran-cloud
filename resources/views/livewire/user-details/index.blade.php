<div>
    <x-slot name="header">User Details</x-slot>

    <x-forms.m-panel>

        <!-- Top Controls  -------------------------------------------------------------------------------------------->

        <x-forms.top-controls :show-filters="$showFilters"/>

        <div class="flex w-full">

            <x-table.caption :caption="'User Details'">
                {{$list->count()}}
            </x-table.caption>

        </div>

        <x-table.form>

            <!-- Table Header  ---------------------------------------------------------------------------------------->

            <x-slot:table_header name="table_header" class="bg-green-100">

                <x-table.header-serial></x-table.header-serial>

                <x-table.header-text sort-icon="none">Display Name</x-table.header-text>

                <x-table.header-text sort-icon="none">Bio</x-table.header-text>

                <x-table.header-text sort-icon="none">Role</x-table.header-text>

                <x-table.header-action/>
            </x-slot:table_header>

            <!-- Table Body  ------------------------------------------------------------------------------------------>

            <x-slot:table_body name="table_body">

                <x-table.row>

                    @foreach($list as $index=>$row)

                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>

                        <x-table.cell-text left>{{$row->vname}}</x-table.cell-text>

                        <x-table.cell-text left>{{$row->bio}}</x-table.cell-text>

                        <x-table.cell-text>{{$row->role}}</x-table.cell-text>

                        <x-table.cell-action id="{{$row->id}}"/>

                    @endforeach

                </x-table.row>

            </x-slot:table_body>

        </x-table.form>

        <x-modal.delete/>

        <!-- Create  -------------------------------------------------------------------------------------------------->

        <x-forms.create :id="$common->vid">

            <div class="space-y-5">
                <x-input.floating wire:model="common.vname" :label="'Display Name'"/>

                <x-input.floating wire:model="bio" :label="'User Bio'"/>

                <x-input.floating wire:model="role" :label="'User Role'"/>

            </div>
        </x-forms.create>

    </x-forms.m-panel>

</div>
