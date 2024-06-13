@props(['application'])
<tr class="border-b-0 my-4 text-sm md:text-base">
                        <td class="text-center">
                            <p class="mb-1 font-medium">
                                {{$application->name}} {{$application->surname}}
                            </p>
                        </td>

                        <td class="text-center hidden md:table-cell">
                            <p class="mb-1 font-medium">
                                {{$application->email}}
                            </p>
                        </td>

                        <td class="text-center">

                            <p class="mb-1 font-medium">
                                {{$application->vacancy()->first()->title}}
                            </p>
                        </td>

                        <td class="text-center hidden sm:table-cell">
                            <a href="{{route("cv-application", $application->id)}}" target="_blank" >
                                <i class="fa-solid fa-paperclip text-center text-accent1 hover:underline"></i>
                            </a>
                        </td>

                        <td class="text-center hidden sm:table-cell">
                            <p class="mb-1 font-medium">
                                {{ $application->status->status }}
                            </p>
                        </td>

                        <td>
                            <div class="flex items-center justify-center gap-x-2">
                                <a class="btn btn-circle btn-outline btn-sm shadow" href="{{route("view-application", $application->id)}}">
                                    <i class="fa-solid fa-eye text-accent1"></i>
                                </a>
                                <form action="{{ route("delete-application", $application->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-circle btn-outline btn-sm shadow">
                                        <i class="fa-solid fa-trash-can text-red-500"></i>
                                    </button>
                                </form>
                        </td>
                    </tr>
