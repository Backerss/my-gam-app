<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานพฤติกรรมนักเรียน - {{ $student->name }}</title>
</head>
<body class="bg-gray-50">
    <div class="max-w-4xl mx-auto py-8 px-4">
        <!-- Student Info -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
            <div class="bg-gradient p-6 text-white">
                <h1 class="text-2xl font-bold mb-2">{{ $student->name }}</h1>
                <div class="flex items-center space-x-4 text-sm">
                    <span>รหัสนักเรียน: {{ $student->student_id }}</span>
                    <span>•</span>
                    <span>ชั้น {{ $student->class }}</span>
                </div>
            </div>

            <!-- Score Summary -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600">คะแนนพฤติกรรมปัจจุบัน</p>
                        <p class="text-2xl font-bold text-indigo-600">{{ $student->current_score }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600">การเปลี่ยนแปลงล่าสุด</p>
                        <p class="text-2xl font-bold {{ $student->score_change >= 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $student->score_change > 0 ? '+' : '' }}{{ $student->score_change }}
                        </p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600">จำนวนเหตุการณ์</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $student->behaviorRecords->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Behavior History -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">ประวัติพฤติกรรม</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">วันที่</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">รายละเอียด</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">คะแนน</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($student->behaviorRecords as $record)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                {{ $record->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800">
                                {{ $record->description }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right">
                                <span class="px-2 py-1 rounded-full text-sm {{ $record->points >= 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $record->points >= 0 ? '+' : '' }}{{ $record->points }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>