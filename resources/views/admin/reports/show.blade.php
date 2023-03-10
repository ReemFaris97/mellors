

                                <tbody>
                                    @if(isset($items))

                                    @foreach ($items as $item)
                                    <tr role="row" class="odd" id="row-{{ $item->id }}">
                                        <td tabindex="0" class="sorting_1">{{ $item->id }}</td>
                                        <td>{{ $item->question }}</td>
                                        <td>@if($item->answer == "yes")
                                            <label style="background-color: aquamarine;">Yes</label>
                                            @elseif($item->answer == "no")
                                            <label style="background-color: red; font-weight: bold;">No</label>
                                            @else
                                            {{ $item->answer }}
                                            @endif
                                        </td>
                                        <td>{{ $item->comment }}</td>

                                    </tr>

                                    @endforeach
                                <tfoot>
                                    <tr role="row" class="odd" id="row-{{ 1 }}">
                                        <td tabindex="0" class="sorting_1">{{ 1}}</td>
                                        <td> Completed By
                                        </td>
                                        @forelse($items as $item)
                                        <td>{{$item->user->name}}
                                            @break
                                        </td>
                                        @empty
                                        <td>Not found</td>
                                        @endforelse
                                    </tr>
                                </tfoot>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
